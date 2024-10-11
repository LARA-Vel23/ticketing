<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    // Show the form for requesting a password reset link
    public function showForgetPasswordForm()
    {
        return view('auth.passwords.forgetpassword');
    }

    // Handle the submission of the forget password form
    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email', // Ensure the email exists
        ]);

        $token = Str::random(64);

        // Delete any existing tokens for this email
        DB::table('password_reset_tokens')->where('email', $request->email)->delete();

        // Insert the new token
        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        // Send the reset email
        Mail::send('auth.passwords.email', ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);  // Correct the reference to email
            $message->subject('Reset Password');
        });

        return redirect()->route('auth.login')->with('status', 'Password reset link sent!');
    }

    // Show the form to reset the password
    public function showResetPasswordForm($token)
    {
        return view('auth.passwords.reset', ['token' => $token]);
    }

    // Handle the submission of the reset password form
    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string|confirmed|min:8',
            'password_confirmation' => 'required',
        ]);

        // Find the user
        $user = DB::table('users')->where('email', $request->email)->first();

        if ($user) {
            DB::table('users')->where('email', $request->email)->update(['password' => bcrypt($request->password)]);
            return redirect()->route('auth.login')->with('status', 'Password reset successfully.');
        }

        return back()->withErrors(['email' => 'Email not found.']);
    }
}
