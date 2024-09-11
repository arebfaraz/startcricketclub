<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MatchResult;
use App\Models\Team;
use Illuminate\Http\Request;

class MatchResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $results = MatchResult::all();
        return view('backend.result.index', compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teams = Team::where('active', 'Y')->get();
        return view('backend.result.add', compact('teams'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'team_1_id' => 'required',
                'team_2_id' => ['required', 'different:team_1_id'],
                'won_team_id' => 'required',
                'team_1_score' => 'required',
                'team_2_score' => 'required',
                'team_1_wicket' => 'required',
                'team_2_wicket' => 'required',
                'team_1_over' => 'required',
                'team_2_over' => 'required',
                'won_by' => 'required',
                'won_by_no' => 'required',
            ],
            [
                'team_1_id.required' => 'Please select team',
                'team_2_id.required' => 'Please select team',
                'team_2_id.different' => 'Please select different team',
                'won_team_id.required' => 'Please select team',
                'team_1_score.required' => 'Score field required',
                'team_2_score.required' => 'Score field required',
                'team_1_wicket.required' => 'Wicket field required',
                'team_2_wicket.required' => 'Wicket field required',
                'team_1_over.required' => 'Over field required',
                'team_2_over.required' => 'Over field required',
                'won_by.required' => 'Won by field required',
                'won_by_no.required' => 'This field is required',
            ]
        );

        MatchResult::create($validatedData);

        return redirect()->route('match-result.index')->with('success', 'Result added successfully');
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
        $result = MatchResult::find($id);
        if ($result) {
            $teams = Team::where('active', 'Y')->get();

            return view('backend.result.edit', compact('result', 'teams'));
        }
        return redirect()->route('match-result.index')->with('error', 'Result not found');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate(
            [
                'team_1_id' => 'required',
                'team_2_id' => ['required', 'different:team_1_id'],
                'won_team_id' => 'required',
                'team_1_score' => 'required',
                'team_2_score' => 'required',
                'team_1_wicket' => 'required',
                'team_2_wicket' => 'required',
                'team_1_over' => 'required',
                'team_2_over' => 'required',
                'won_by' => 'required',
                'won_by_no' => 'required',
            ],
            [
                'team_1_id.required' => 'Please select team',
                'team_2_id.required' => 'Please select team',
                'team_2_id.different' => 'Please select different team',
                'won_team_id.required' => 'Please select team',
                'team_1_score.required' => 'Score field required',
                'team_2_score.required' => 'Score field required',
                'team_1_wicket.required' => 'Wicket field required',
                'team_2_wicket.required' => 'Wicket field required',
                'team_1_over.required' => 'Over field required',
                'team_2_over.required' => 'Over field required',
                'won_by.required' => 'Won by field required',
                'won_by_no.required' => 'This field is required',
            ]
        );


        MatchResult::find($id)->update($validatedData);

        return redirect()->route('match-result.index')->with('success', 'Result updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = MatchResult::find($id);
        if ($result) {
            $result->delete();
            return redirect()->back()->with('success', 'Result deleted successfully');
        }
        return redirect()->back()->with('error', 'Result not found');
    }
}