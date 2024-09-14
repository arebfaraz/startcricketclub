<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Player;
use App\Models\Team;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function dashboard()
    {
        $query = Player::whereNotNull('team_id');
        $data['players'] = (clone $query)->count();
        $data['paid'] = (clone $query)->where('is_payment', 'Y')->count();
        $data['unpaid'] = (clone $query)->where('is_payment', 'N')->count();
        $data['renewal'] = (clone $query)->where('is_payment', 'Y')->whereDoesntHave('current_month_payment')->count();
        $data['unpaid_month'] = (clone $query)->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)->where('is_payment', 'N')->count();
        $data['teams'] = Team::where('active', 'Y')->count();
        return view('backend.dashboard', $data);
    }
}
