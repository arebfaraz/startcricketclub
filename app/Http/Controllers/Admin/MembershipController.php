<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;

class MembershipController extends Controller
{

    public function index()
    {
        $memberships = Player::whereNull('team_id')->get();
        $teams = Team::where('active', 'Y')->get();
        return view('backend.membership.index', compact('memberships', 'teams'));
    }

    public function paymentStatus(Request $request)
    {
        $player = Player::find($request->id);
        $player->is_payment = $player->is_payment == 'Y' ? 'N' : 'Y';
        $player->save();
        return response()->json(['success' => 'Payment updated successfully!']);
    }

    public function teamAssign(Request $request)
    {
        $player = Player::find($request->player_id);
        $player->update([
            'team_id' => $request->team_id,
            'type' => $request->type
        ]);

        return redirect()->route('membership.index')->with('success', 'Team assigned successfully');
    }
}
