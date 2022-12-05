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
        $request->session()->regenerate();

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            if (Auth::user()->role == "Kurir") {
                return redirect()->intended('/log-kurir');
            } else {
                return redirect()->intended('/dashboard');
            }
        }
        return redirect("/");
    }

    public function logout(Request $request)
    {
        // Session::flush();
        Auth::logout();

        $request->session()->invalidate();
 
        $request->session()->regenerateToken();
        // $cookie = Cookie::forget('smarttoken');
        return redirect("/");
    }
}
