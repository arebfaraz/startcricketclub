<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $players = Player::whereNotNull('team_id')->get();
        return view('backend.player.index', compact('players'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teams = Team::where('active', 'Y')->get();
        $filePath = public_path('front/countries.json');

        // Get the content of the JSON file
        $json = File::get($filePath);

        // Decode the JSON data
        $countries = json_decode($json, true);
        $jersey_nos = Player::pluck('jersey_number')->toArray();

        return view('backend.player.add', compact('teams', 'countries', 'jersey_nos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'image' => 'nullable|file|max:8192',
            'team_id' => 'required',
            'type' => 'required',
            'player_type' => 'required',
            'email' => 'nullable|email',
            'phone' => 'required|numeric',
            'status_in_cambodia' => 'required',
            'city' => 'required',
            'bio' => 'required',
            'history' => 'nullable',
            'nationality' => 'required',
            'jersey_name' => 'required',
            'jersey_size' => 'required',
            'jersey_number' => 'required|unique:players,jersey_number',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $originalName = str_replace(' ', '_', $image->getClientOriginalName());
            $imageName =  time()  . '_' . $originalName;
            $image->storeAs('player_images', $imageName, 'public');
            $validatedData['image'] = $imageName;
        }

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

        // Step 4: Assign the generated sr_no to validated data
        $validatedData['sr_no'] = $newSrNo;


        $player = Player::create($validatedData);
        if ($request->submit == 'stats') {
            return redirect()->route('player-stats.show', $player->id);
        }
        return redirect()->route('player.index')->with('success', 'Player added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $player = Player::find($id);
        if ($player) {
            $teams = Team::where('active', 'Y')->get();
            $filePath = public_path('front/countries.json');

            // Get the content of the JSON file
            $json = File::get($filePath);

            // Decode the JSON data
            $countries = json_decode($json, true);
            $jersey_nos = Player::whereNot('id', $id)->pluck('jersey_number')->toArray();
            return view('backend.player.edit', compact('player', 'teams', 'jersey_nos', 'countries'));
        }
        return redirect()->route('player.index')->with('error', 'Player not found');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'image' => 'nullable|file|max:8192',
            'team_id' => 'required',
            'type' => 'required',
            'bio' => 'required',
            'history' => 'nullable',
            'player_type' => 'required',
            'email' => 'nullable|email',
            'phone' => 'required|numeric',
            'status_in_cambodia' => 'required',
            'city' => 'required',
            'nationality' => 'required',
            'jersey_name' => 'required',
            'jersey_size' => 'required',
            'jersey_number' => 'required|unique:players,jersey_number,' . $id,
        ]);

        $player = Player::find($id);
        $validatedData['image'] = $player->image;

        if ($request->hasFile('image')) {
            if ($player->image && file_exists('storage/player_images/' . $player->image)) {
                unlink('storage/player_images/' . $player->image);
            }
            $image = $request->file('image');
            $originalName = str_replace(' ', '_', $image->getClientOriginalName());
            $imageName =  time()  . '_' . $originalName;
            $image->storeAs('player_images', $imageName, 'public');
            $validatedData['image'] = $imageName;
        }

        $player->update($validatedData);

        return redirect()->route('player.index')->with('success', 'Player updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $player = Player::find($id);
        if ($player) {
            $player->delete();
            return redirect()->back()->with('success', 'Player deleted successfully');
        }
        return redirect()->back()->with('error', 'Player not found');
    }
}
