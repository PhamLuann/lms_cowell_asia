<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->all();
        try {
            $user = Sentinel::authenticate($credentials);
            if ($user) {
                return response()->json([
                    'success' => 'OK',
                    'token' => $user->createToken('$2y$10$DdhHAg.PDyDY0v7c94bbfeHvD9CEK13Cr41fnUEjBW2Kv.C/PbbqO')
                    ->accessToken,
                ], 200);
            } else {
                $msg = 'The provided credentials do not match our records.';
            }
        } catch (NotActivatedException $n) {
            $msg = 'The user is note activation';
        } catch (ThrottlingException $t) {
            $msg = 'The user is banded in '
                . round($t->getDelay() / 60) . ' minute';
        }

        return response()->json([
            'success' => 'NG',
            'msg' => $msg
        ], 406);
    }
}
