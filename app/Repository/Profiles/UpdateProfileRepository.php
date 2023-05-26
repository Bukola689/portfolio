<?php

namespace App\Repository\Profile;


use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class UpdateProfileRepository implements  IUpdateProfileRepository
{
    public function updateProfile(Request $request, array $data)
    {
         $profile = $request->user();

          $profile->name = $request->input('name');
          $profile->update();

         // event(new UpdateProfile($profile));

    }

    public function changePassword(Request $request, array $data)
    {
       // event(new ChangePassword(User::factory()->make()));

        $profile = $request->user();  

        if( Hash::check($request->old_password, $profile->password)){
            
          $profile = $profile->update([
                'password' => Hash::make($request->password)
            ]);

        //    return response()->json([
        //       'message'=> 'Password Up Successfully',
        //    ], 200);
           
        }

       // event(new ChangePassword($profile));
       
    }
}