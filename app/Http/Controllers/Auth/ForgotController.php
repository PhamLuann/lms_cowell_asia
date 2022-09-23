<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Support\Facades\Session;
use Cartalyst\Sentinel\Laravel\Facades\Reminder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\Auth\ChangePasswordRequest;
use App\Http\Requests\Auth\ResetPasswordRequest;
use App\Http\Requests\Auth\ForgotPasswordRequest;
use Illuminate\Support\Facades\Log;

class ForgotController extends Controller
{
    /**
     * Display the password reset view for the email.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function forgotPassword()
    {
        return view('auth.password.forgot');
    }

    /**
     * Send the given user's email reset instruction.
     *
     * @param ForgotPasswordRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function processForgotPassword(ForgotPasswordRequest $request)
    {
        DB::beginTransaction();
        try {
            $credentials = [
                'login' => $request->email
            ];

            $user = Sentinel::findByCredentials($credentials);

            if (! $user) {
                DB::rollBack();

                Session::flash('failed', __('auth.forgot_password_email_not_found'));

                return redirect()->back()->withInput();
            }

            $reminder = Reminder::exists($user) ?: Reminder::create($user);

            $code = $reminder->code;

            $sent = Mail::send('auth.emails.password', compact('user', 'code'), function ($m) use ($user) {
                $m->to($user->email)->subject('Reset your account password.');
            });

            // $sent = 1;

            if ($sent === 0) {
                DB::commit();
                Session::flash('failed', __('auth.forgot_password_unsuccessful'));

                return redirect()->back();
            }

            DB::commit();

            Session::flash('success', __('auth.forgot_password_successful'));
            return redirect()->back();
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::info($exception->getMessage());

            Session::flash('failed', __('auth.forgot_password_unsuccessful'));

            return redirect()->back();
        }
    }

    /**
     * Display the password reset view for the given token.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function resetPassword()
    {
        return view('auth.password.reset');
    }

    /**
     * Reset the given user's password.
     *
     * @param ResetPasswordRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function processResetPassword(ResetPasswordRequest $request)
    {
        $user = Sentinel::findById($request->userId);

        if (! $user) {
            Session::flash('failed', __('auth.forgot_password_email_not_found'));
            return redirect()->back()->withInput();
        }

        if (! Reminder::complete($user, $request->code, $request->password)) {
            Session::flash('failed', __('Invalid or expired reset code.'));

            return redirect()->route('forgotPassword.form');
        }

        Session::flash('success', __('auth.password_change_successful'));

        return redirect()->route('login.form');
    }

    /**
     * Display the denied view
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function accessDenied()
    {
        return view('auth.password.change');
    }

    /**
     * Display the change password form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function changePassword()
    {
        return view('auth.password.change');
    }

    /**
     * Handle change password action
     *
     * @param ChangePasswordRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function processChangePassword(ChangePasswordRequest $request)
    {
        $user = Sentinel::getUser();

        $credentials = [
            'email' => $user->email,
            'password' => $request->old_password
        ];

        # Is this password is valid for this user?
        if (Sentinel::validateCredentials($user, $credentials)) {
            $credentials['password'] = $request->password;

            Sentinel::update($user, $credentials);

            Sentinel::logout();

            Session::flash('success', __('auth.password_change_successful'));
            return redirect()->route('login.form');
        } else {
            Session::flash('failed', __('auth.reset_password_change_unsuccessful_old'));
            return redirect()->back()->withInput($request->all());
        }
    }
}
