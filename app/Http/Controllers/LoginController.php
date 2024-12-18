<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view ('auth.login', [
            'page' => 'Login',
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'employee_id' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt([
            'employee_id' => $credentials['employee_id'],
            'password' => $credentials['password']
        ])) {
            $request->session()->regenerate();

            return redirect()->route('dashboard.index');
        }

        return back()->with('loginError', 'Password is incorrect!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('login'));
    }
}
