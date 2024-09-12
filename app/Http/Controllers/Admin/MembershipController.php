<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Membership;
use Illuminate\Http\Request;

class MembershipController extends Controller
{

    public function index()
    {
        $memberships = Membership::all();
        return view('backend.membership.index', compact('memberships'));
    }
}
