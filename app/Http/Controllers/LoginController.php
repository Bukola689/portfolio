<?php

namespace App\Http\Controllers;

use App\Events\Login;
use App\Models\User;
use App\Notifications\LoginNotification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $regUser = User::first();

        $data = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

      $user = User::where('email', $data['email'])->first();

      if(!$user || !Hash::check($data['password'], $user->password))
      {
          return response(['message'=>'invalid credentials'], 401);

          $regUser->notify(new LoginNotification($user));
  
          event(new Login($user));

      } else {
        $token  = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user'=>$user,
            'token'=>$token,
        ];

        return response($response, 200);
      }
    }
}
