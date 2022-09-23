<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class LogoutController extends Controller
{
    public function logout(Request $request)
    {
        Sentinel::logout();
        $request->session()->forget('name');
        return redirect(route('login'));
    }
}
