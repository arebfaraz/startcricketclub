<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::all();
        return view('backend.team.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.team.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => [
                'required',
                Rule::unique('teams')->whereNull('deleted_at')
            ],
            'logo' => 'required|file|max:8192'
        ]);
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $originalName = str_replace(' ', '_', $logo->getClientOriginalName());
            $logoName =  time()  . '_' . $originalName;
            $logo->storeAs('team_logos', $logoName, 'public');
            $validatedData['logo'] = $logoName;
        }

        Team::create($validatedData);

        return redirect()->route('team.index')->with('success', 'Team added successfully');
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
        $team = Team::find($id);
        if ($team) {
            return view('backend.team.edit', compact('team'));
        }
        return redirect()->route('team.index')->with('error', 'Team not found');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => [
                'required',
                Rule::unique('teams')->ignore($id)->whereNull('deleted_at')
            ],
            'active' => 'required',
            'logo' => 'nullable|file|max:8192'
        ]);

        $team = Team::find($id);
        $validatedData['logo'] = $team->logo;

        if ($request->hasFile('logo')) {
            if ($team->logo && file_exists('storage/team_logos/' . $team->logo)) {
                unlink('storage/team_logos/' . $team->logo);
            }
            $logo = $request->file('logo');
            $originalName = str_replace(' ', '_', $logo->getClientOriginalName());
            $logoName =  time()  . '_' . $originalName;
            $logo->storeAs('team_logos', $logoName, 'public');
            $validatedData['logo'] = $logoName;
        }

        $team->update($validatedData);

        return redirect()->route('team.index')->with('success', 'Team updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $team = Team::find($id);
        if ($team) {
            if (count($team->players) > 0) {
                return redirect()->back()->with('error', "Team has players, so team can't be deleted");
            }
            $team->delete();
            return redirect()->back()->with('success', 'Team deleted successfully');
        }
        return redirect()->back()->with('error', 'Team not found');
    }
}
