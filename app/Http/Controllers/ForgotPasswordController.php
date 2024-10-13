<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
// use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    // use SendsPasswordResetEmails;
    public function forgot()
    {
        return view('auth.passwords.forgotpassword');
    }

    public function forgot_password(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
        ]);


        $user = User::where('email', $request->email)->first();

        if ($user) {
            $user->remember_token = Str::random(40);
            $user->save();
            Mail::to($user->email)->send(new ForgotPasswordMail($user));
            return redirect()->back()->with('success', "Please check your email and reset your password");
        } else {
            return redirect()->back()->with('error', 'Email not found');
        }
    }

    public function reset($token)
    {
        $user = User::where('remember_token', '=', $token)->first();

        if (!empty($user)) {

            return view('auth.passwords.reset', [
                'user' => $user,
                'token' => $token,
            ]);
        } else {
            abort(404);
        }
    }

    public function post_reset($token, Request $request)
    {
        $user = User::where('remember_token', '=', $token)->first();
        if(!empty($user)){
            if($request->password == $request->cpassword)
            {
                $user->password = Hash::make($request->password);
                $user->remember_token = Str::random(40);
                $user->save();


                return redirect()->route('login')->with('success', 'Password successfully reset');
            }
            else{
                return redirect()->back()->with('error', 'Password and Confirm Password does not match');
            }
        }
        else{
            abort(404);
        }
    }
}
