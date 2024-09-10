<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\UpcomingMatch;
use Illuminate\Http\Request;

class UpcomingMatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matches = UpcomingMatch::all();
        return view('backend.upcoming-match.index', compact('matches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teams = Team::where('active', 'Y')->get();
        return view('backend.upcoming-match.add', compact('teams'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'team_1_id' => 'required',
            'team_2_id' => ['required', 'different:team_1_id'],
            'location' => 'required',
            'date' => 'required',
            'time' => 'required',
            'type' => 'required',
        ], [
            'team_2_id.different' => 'The team 2 must be different.'
        ]);
        UpcomingMatch::create($validatedData);

        return redirect()->route('upcoming-match.index')->with('success', 'Upcoming match added successfully');
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
        $match = UpcomingMatch::find($id);
        if ($match) {
            $teams = Team::where('active', 'Y')->get();

            return view('backend.upcoming-match.edit', compact('match', 'teams'));
        }
        return redirect()->route('upcoming-match.index')->with('error', 'Match not found');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'team_1_id' => 'required',
            'team_2_id' => ['required', 'different:team_1_id'],
            'location' => 'required',
            'date' => 'required',
            'time' => 'required',
            'type' => 'required',
        ], [
            'team_2_id.different' => 'The team 2 must be different.'
        ]);

        UpcomingMatch::find($id)->update($validatedData);


        return redirect()->route('upcoming-match.index')->with('success', 'Upcoming match updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $match = UpcomingMatch::find($id);
        if ($match) {
            $match->delete();
            return redirect()->back()->with('success', 'Upcoming match deleted successfully');
        }
        return redirect()->back()->with('error', 'Upcoming match not found');
    }
}
