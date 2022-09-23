<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Middleware\SentinelAuth;
use App\Http\Requests\Auth\LoginRequest;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function postLogin(LoginRequest $request)
    {
        $credentials = $request->except('_token');          
        try {
            $user = Sentinel::authenticate($credentials);
            if ($user) 
            {
                if($user->inRole('admin')) {
                    $request->session()->regenerate();
                    $request->session()->put('name', $user->first_name);
                    return redirect()->intended(route('admin.index'));
                }else if ($user->inRole('user')) {
                    $request->session()->regenerate();
                    $request->session()->put('name', $user->first_name);
                    return redirect()->intended(route('dashboard'));
                }else{
                    $request->session()->regenerate();
                    $request->session()->put('name', $user->first_name);
                    return redirect()->intended(route('adminedit.index'));
                }
            }else {
                $msg = 'The provided credentials do not match our records.';
            }
        } catch (NotActivatedException $n) {
            $msg = 'The user is note activation';
        } catch (ThrottlingException $t) {
            $msg = 'The user is banded in '
                . round($t->getDelay() / 60) . ' minute';
        }

        return back()->withErrors([
            'email' => $msg,
        ])->onlyInput('email');
    }
}
