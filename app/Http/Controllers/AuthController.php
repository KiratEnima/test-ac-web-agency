<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginAttemptRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Show login form
     */
    public function showLogin(Request $request)
    {
        return view('login');
    }

    /**
     * Login user
     */
    public function attemptLogin(LoginAttemptRequest $request)
    {
        if (Auth::guest()) {
            $userdata = array(
                'email'     => $request->get('email'),
                'password'  => $request->get('password')
            );
            if (!Auth::attempt($userdata, true)) {
                return redirect()->route('auth.login')->withErrors('Coordonnées invalides');
            }
            $request->session()->regenerate();
        }

        return redirect()->intended('/');
    }

    /**
     * Logout user
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.login');
    }
}
