<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Player;
use App\Models\PlayerStat;
use Illuminate\Http\Request;

class PlayerStatController extends Controller
{
    public function show($id)
    {
        $data['player'] = Player::findOrFail($id);
        $data['stats'] = PlayerStat::where('player_id', $id)->first();
        return view('backend.stats.add', $data);
    }

    public function update(Request $request, $id)
    {
        $data = [
            'player_id' => $id,
            'matches' => $request->matches ?? 0,
            'innings' => $request->innings ?? 0,
            'runs' => $request->runs ?? 0,
            'strike_rate' => $request->strike_rate ?? 0,
            'highest_runs' => $request->highest_runs ?? 0,
            'catches' => $request->catches ?? 0,
            'overs' => $request->overs ?? 0,
            'wickets' => $request->wickets ?? 0,
            'fours' => $request->fours ?? 0,
            'sixes' => $request->sixes ?? 0,
            'fifties' => $request->fifties ?? 0,
            'hundreds' => $request->hundreds ?? 0,
            'average' => $request->average ?? 0,
            'economy' => $request->economy ?? 0,
        ];

        PlayerStat::updateOrCreate(['player_id' => $id], $data);
        return redirect()->route('player.index')->with('success', 'Stats added successfully');
    }
}