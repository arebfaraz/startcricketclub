<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $players = Player::all();
        return view('backend.player.index', compact('players'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teams = Team::where('active', 'Y')->get();
        return view('backend.player.add', compact('teams'));
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
            'phone' => 'nullable|numeric',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $originalName = str_replace(' ', '_', $image->getClientOriginalName());
            $imageName =  time()  . '_' . $originalName;
            $image->storeAs('player_images', $imageName, 'public');
            $validatedData['image'] = $imageName;
        }

        Player::create($validatedData);

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

            return view('backend.player.edit', compact('player', 'teams'));
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
            'player_type' => 'required',
            'email' => 'nullable|email',
            'phone' => 'nullable|numeric',
        ]);

        $player = Player::find($id);

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
