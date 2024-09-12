<?php

namespace App\Http\Controllers;

use App\Mail\MembershipConfirmation;
use App\Mail\MembershipMail;
use App\Models\MatchResult;
use App\Models\Membership;
use App\Models\Player;
use App\Models\Slider;
use App\Models\Team;
use App\Models\UpcomingMatch;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    public function index()
    {
        $data['teams'] = Team::where('active', 'Y')->get();
        $data['players'] = Player::where('active', 'Y')->where('is_highlight', 'Y')->take(8)->get();
        $data['slider'] = Slider::latest()->first();
        $data['results'] = MatchResult::latest()->take('6')->get();
        // Get the current date and time
        $now = Carbon::now();

        // Fetch all upcoming matches where the date and time are greater than or equal to the current date and time
        $data['upcomingMatches'] = UpcomingMatch::whereRaw("CONCAT(date, ' ', time) >= ?", [$now])
            ->orderBy('date', 'asc')
            ->orderBy('time', 'asc')
            ->take(4)->get();

        return view('front.home', $data);
    }

    public function membership()
    {
        $filePath = public_path('front/countries.json');

        // Get the content of the JSON file
        $json = File::get($filePath);

        // Decode the JSON data
        $countries = json_decode($json, true);


        $jersey_nos = Membership::pluck('jersey_number')->toArray();
        return view('front.membership', compact('jersey_nos', 'countries'));
    }

    public function membershipStore(Request $request)
    {
        $validatedData = $request->validate(
            [
                'player_name' => 'required',
                'phone' => 'required|numeric',
                'email' => 'required|email',
                'status' => 'required',
                'city' => 'required',
                'nationality' => 'required',
                'player_type' => 'required',
                'jersey_name' => 'required',
                'jersey_size' => 'required',
                'jersey_number' => 'required|unique:memberships,jersey_number',
                'photo' => 'required|file',
                'payment_screenshot' => 'nullable|file',
                'is_agree' => 'required',
                'captcha_code' => 'required',
            ],
            [
                'is_agree.required' => 'Please check',
                'captcha_code.required' => 'Captcha is required',
                'jersey_number.unique' => 'The jersey number already taken',
            ]
        );

        $sessionCaptcha = Session::get('session_refresh');
        if ($sessionCaptcha === $request->captcha_code) {
            $validatedData['reg_no'] = $this->generateUniqueRegNo();

            if ($request->hasFile('photo')) {
                $photo = $request->file('photo');
                $originalName = str_replace(' ', '_', $photo->getClientOriginalName());
                $photoName =  time()  . '_' . $originalName;
                $photo->storeAs('memberships', $photoName, 'public');
                $validatedData['photo'] = $photoName;
            }

            if ($request->hasFile('payment_screenshot')) {
                $screenshot = $request->file('payment_screenshot');
                $originalName = str_replace(' ', '_', $screenshot->getClientOriginalName());
                $screenshotName =  time()  . '_' . $originalName;
                $screenshot->storeAs('memberships', $screenshotName, 'public');
                $validatedData['payment_screenshot'] = $screenshotName;
            }

            Membership::create($validatedData);

            // Mail::to('nirmaljit1983@gmail.com')->send(new MembershipMail($validatedData));
            Mail::to('mofaisal739@gmail.com')->send(new MembershipMail($validatedData));
            Mail::to($request->email)->send(new MembershipConfirmation($validatedData));

            return redirect()->route('home')->with('success', 'Thank you for contacting us! We will get back soon.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Invalid Captcha');
        }
    }

    public function updateImage()
    {
        $builder = new CaptchaBuilder;
        $builder->build();
        $session = $builder->getPhrase();
        session()->forget('session_refresh');
        Session::put('session_refresh', $session);
        $check =  Session::get('session_refresh');
        return response()->json(['session_refresh' => $check, 'result' => $builder->inline()]);
    }

    private function generateUniqueRegNo()
    {
        do {
            // Step 2: Generate the registration number
            $reg_no = 'CLC' . mt_rand(100000, 999999);
        } while (Membership::where('reg_no', $reg_no)->exists()); // Step 3: Ensure it is unique

        return $reg_no;
    }
}
