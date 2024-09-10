<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login()
    {
        return view('backend.auth.login');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return back()
                ->with('error', $validator->messages()->all()[0])
                ->withInput();
        }
        if (Auth::guard('admin')->attempt(
            ['email' => $request->email, 'password' => $request->password, 'active' => 'Y']
        )) {
            // Redirect to the admin dashboard on successful login
            return redirect('/admin/dashboard');
        }

        // Return back with error message if credentials are invalid or 'active' is not 'Y'
        return redirect()
            ->back()
            ->with('error', 'Invalid credentials or account not active')
            ->withInput();
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }
}
