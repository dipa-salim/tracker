<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Illuminate\Routing\Controller;
// use Illuminate\Support\Facades\Auth;
// use Symfony\Component\HttpFoundation\Cookie;
// use Symfony\Component\HttpFoundation\Session\Session;

use Hash;
use JWTAuth;
use Session;
use JWTFactory;
use App\Models\User;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request;
use GuzzleHttp\RetryMiddleware;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'email',
            'password' => 'required',
        ]);

        // $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            if (Auth::user()->role == "Kurir") {
                return redirect()->intended('/log-kurir');
            } else {
                return redirect()->intended('/dashboard');
            }
        }
        dd(Auth::user());

        return redirect("login");
    }

    // public function logout()
    // {
    //     Session::flush();
    //     $cookie = Cookie::forget('smarttoken');
    //     Auth::logout();

    //     return redirect('login')->withCookie($cookie);
    // }
}
