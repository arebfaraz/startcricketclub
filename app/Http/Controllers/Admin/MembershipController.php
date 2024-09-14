<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Player;
use App\Models\PlayerPayment;
use App\Models\Team;
use Illuminate\Http\Request;

class MembershipController extends Controller
{

    public function index()
    {
        $memberships = Player::whereNull('team_id')
            ->orWhereDoesntHave('current_month_payment')
            ->get();
        $teams = Team::where('active', 'Y')->get();
        return view('backend.membership.index', compact('memberships', 'teams'));
    }

    public function paymentStatus(Request $request)
    {
        Player::find($request->player_id)->update(['is_payment' => 'Y']);
        PlayerPayment::updateOrCreate([
            'player_id' => $request->player_id,
            'payment_date' => $request->payment_date,

        ], [
            'player_id' => $request->player_id,
            'payment_date' => $request->payment_date,
            'amount' => $request->amount,
        ]);
        return redirect()->route('membership.index')->with('success', 'Payment updated successfully');
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
