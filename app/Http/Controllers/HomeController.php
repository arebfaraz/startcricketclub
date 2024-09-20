<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Mail\MembershipConfirmation;
use App\Mail\MembershipMail;
use App\Models\Blog;
use App\Models\Gallery;
use App\Models\MatchResult;
use App\Models\Player;
use App\Models\Slider;
use App\Models\Team;
use App\Models\UpcomingMatch;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index()
    {
        $data['teams'] = Team::where('active', 'Y')->get();
        $data['players'] = Player::where('active', 'Y')->where('is_highlight', 'Y')->take(8)->get();
        $data['slider'] = Slider::latest()->first();
        $data['results'] = MatchResult::latest()->take('6')->get();
        $data['galleries'] = Gallery::latest()->take('6')->get();
        $data['blogs'] = Blog::orderBy('date', 'desc')->where('type', '1')->take('4')->get();
        // Get the current date and time
        $now = Carbon::now();

        // Fetch all upcoming matches where the date and time are greater than or equal to the current date and time
        $data['upcomingMatches'] = UpcomingMatch::whereRaw("CONCAT(date, ' ', time) >= ?", [$now])
            ->orderBy('date', 'asc')
            ->orderBy('time', 'asc')
            ->take(4)->get();

        return view('front.home', $data);
    }

    public function about()
    {
        return view('front.about');
    }

    public function membership()
    {

        $filePath = public_path('front/countries.json');

        // Get the content of the JSON file
        $json = File::get($filePath);

        // Decode the JSON data
        $countries = json_decode($json, true);

        $jersey_nos = Player::pluck('jersey_number')->toArray();
        return view('front.membership', compact('jersey_nos', 'countries'));
    }

    public function players(Request $request)
    {
        $players = Player::whereNotNull('team_id')->where('active', 'Y')->latest();
        if ($request->search) {
            $players->where('name', 'LIKE', '%' . $request->search . '%');
        }
        $players = $players->paginate(9);
        return view('front.players', compact('players'));
    }

    public function upcomingMatches()
    {
        $now = Carbon::now();

        $upcomingMatches = UpcomingMatch::whereRaw("CONCAT(date, ' ', time) >= ?", [$now])
            ->orderBy('date', 'asc')
            ->orderBy('time', 'asc')
            ->paginate(6);

        return view('front.upcoming-matches', compact('upcomingMatches'));
    }

    public function matchResults()
    {
        $results = MatchResult::latest()->paginate(6);

        return view('front.match-result', compact('results'));
    }

    public function galleries()
    {
        $galleries = Gallery::latest()->paginate(9);
        return view('front.gallery', compact('galleries'));
    }

    public function playerDetails($slug)
    {
        // Normalize the slug by removing hyphens and converting to lowercase
        $normalizedSlug = strtolower(str_replace('-', ' ', $slug));

        // Query the database to find the player with the normalized name
        $player = Player::whereRaw('LOWER(REPLACE(name, "-", " ")) = ?', [$normalizedSlug])->firstOrFail();

        return view('front.player-detail', compact('player'));
    }

    public function blogs(Request $request)
    {
        $blogs = Blog::orderBy('date', 'desc')->where('type', '1');
        if ($request->search) {
            $blogs->where('title', 'LIKE', '%' . $request->search . '%');
        }
        $blogs = $blogs->paginate(15);
        return view('front.blogs', compact('blogs'));
    }

    public function blogDetail(Request $request, $slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        if ($blog) {
            $sessionKey = 'blog_viewed_' . $blog->id;

            if (!$request->session()->has($sessionKey)) {
                // Increment view count and store in session
                $blog->increment('view_count');
                $request->session()->put($sessionKey, true);
            }
            $data['next_blog'] = Blog::where('type', '1')->where('date', '>', $blog->date)->first();
            $data['previous_blog'] = Blog::where('type', '1')->where('date', '<', $blog->date)->first();
            $data['popular_blogs'] = Blog::orderBy('date', 'desc')->where('type', '1')->whereNot('id', $blog->id)->take(3)->get();
            $data['blog'] = $blog;
        }
        return view('front.blog-detail', $data);
    }

    public function contact()
    {
        return view('front.contact');
    }

    public function contactUs(Request $request)
    {
        $validatedData = $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email',
                'subject' => 'required',
                'comments' => 'required',
                'g-recaptcha-response' => 'required|captcha',
            ],
            [
                'g-recaptcha-response.required' => 'Captcha is required',
            ]
        );
        // Mail::to('nirmaljit1983@gmail.com')->send(new ContactMail($validatedData));
        Mail::to('mofaisal739@gmail.com')->send(new ContactMail($validatedData));
        return redirect()->route('home')->with('success', 'Thank you for contacting us! We will get back soon.');
    }

    public function membershipStore(Request $request)
    {
        $validatedData = $request->validate(
            [
                'name' => 'required',
                'phone' => 'required|numeric|unique:players,phone',
                'email' => 'required|email|unique:players,email',
                'status_in_cambodia' => 'required',
                'city' => 'required',
                'nationality' => 'required',
                'player_type' => 'required',
                'jersey_name' => 'required',
                'jersey_size' => 'required',
                'jersey_number' => 'required|unique:players,jersey_number',
                'image' => 'required|file',
                'payment_screenshot' => 'nullable|file',
                'is_agree' => 'required',
                'g-recaptcha-response' => 'required|captcha',
            ],
            [
                'is_agree.required' => 'Please check',
                'g-recaptcha-response.required' => 'Captcha is required',
                'jersey_number.unique' => 'The jersey number already taken',
                'phone.unique' => 'The phone already registered',
                'email.unique' => 'The email already registered',
            ]
        );

        $validatedData['sr_no'] = $this->generateUniqueSrNo();
        $validatedData['type'] = '3';

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $originalName = str_replace(' ', '_', $image->getClientOriginalName());
            $imageName =  time()  . '_' . $originalName;
            $image->storeAs('player_images', $imageName, 'public');
            $validatedData['image'] = $imageName;
        }

        if ($request->hasFile('payment_screenshot')) {
            $screenshot = $request->file('payment_screenshot');
            $originalName = str_replace(' ', '_', $screenshot->getClientOriginalName());
            $screenshotName =  time()  . '_' . $originalName;
            $screenshot->storeAs('payments', $screenshotName, 'public');
            $validatedData['payment_screenshot'] = $screenshotName;
        }

        Player::create($validatedData);

        Mail::to('mofaisal739@gmail.com')->send(new MembershipMail($validatedData));
        // Mail::to('nirmaljit1983@gmail.com')->send(new MembershipMail($validatedData));
        Mail::to($request->email)->send(new MembershipConfirmation($validatedData));

        return redirect()->route('home')->with('success', 'Thank you for contacting us! We will get back soon.');
    }

    private function generateUniqueSrNo()
    {
        // Step 1: Retrieve the last player's sr_no if it exists
        $lastPlayer = Player::orderBy('id', 'desc')->first();
        $currentDate = now()->format('ymd');  // Format the current date as ymd (e.g., 240912 for September 12, 2024)

        if ($lastPlayer && $lastPlayer->sr_no) {
            // Step 2: Extract the date part from the last sr_no
            $lastSrNo = $lastPlayer->sr_no;
            $lastDatePart = substr($lastSrNo, 3, 6);  // Extract the 6 digits after "CLC"
            $lastNumberPart = substr($lastSrNo, -3);  // Extract the last 3 digits

            if ($lastDatePart === $currentDate) {
                // If the date matches, increment the last 3 digits
                $newNumberPart = str_pad(((int) $lastNumberPart + 1), 3, '0', STR_PAD_LEFT);
            } else {
                // If the date doesn't match, start with 001
                $newNumberPart = '001';
            }
        } else {
            // If no previous sr_no exists, start from scratch
            $newNumberPart = '001';
        }

        // Step 3: Use do-while loop to ensure the sr_no is unique
        do {
            $newSrNo = 'CLC' . $currentDate . $newNumberPart;

            // Check if the sr_no already exists
            $existingSrNo = Player::where('sr_no', $newSrNo)->exists();

            if ($existingSrNo) {
                // If it exists, increment the last 3 digits and pad to ensure it's 3 digits long
                $newNumberPart = str_pad(((int) $newNumberPart + 1), 3, '0', STR_PAD_LEFT);
            }
        } while ($existingSrNo);  // Repeat until a unique sr_no is found

        return $newSrNo;
    }
}
