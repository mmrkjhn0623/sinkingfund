<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
        Auth::logout();
        Cookie::queue(Cookie::forget('user'));
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
