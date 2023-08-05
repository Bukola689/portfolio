<?php

namespace App\Http\Controllers\V1\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use App\Models\PasswordReset;
use App\Rules\Email;
use App\Mail\PasswordResetMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function forgotPassword(Request $request)
    {

        $request->validate([
            'email' => 'required|string'
        ]);
        
        if (! $user = User::firstWhere(['email' => $request->email])) {
            return "Email does not exist.";
        }

        $reset = PasswordReset::createToken($request->email);

        Mail::to($request->email)->send((new PasswordResetMail($user, $reset)));

        return "Reset password link has been sent to your email.";

    }
}
