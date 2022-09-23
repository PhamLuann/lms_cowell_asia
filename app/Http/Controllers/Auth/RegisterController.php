<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Support\Facades\Log;
use App\Models\Students;

class RegisterController extends Controller
{
    /**
     * Show the form for the user registration.
     *
     * @return \Illuminate\View\View
     */
    public function register()
    {
        return view('user.register');
    }

    /**
     * Handle posting of the form for the user registration.
     *
     * @param RegisterRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function processRegistration(RegisterRequest $request)
    {
            DB::beginTransaction();

            $request->offsetSet('created_by', 'Register');
            $request->offsetSet('updated_by', 'Register');
            
            if ($user = Sentinel::registerAndActivate($request->all())) {

                //Attach the user to the role
                $role = Sentinel::findRoleBySlug('user');
                $role->users()
                ->attach($user);

                DB::commit();
                DB::table('students')->insert([
                    'user_id'=>$user->id,
                ]);
                return redirect()->route('login') ;
                
            }else{

            return redirect()->route('user.register');
        }
    }

}
