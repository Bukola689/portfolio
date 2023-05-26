<?php

namespace App\Http\Controllers\V1\Admin;

use App\Http\Controllers\Controller;
use App\Repository\Profile\UpdateProfileRepository;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    protected $profile;

    public function __construct(UpdateProfileRepository $profile)
    {
        $this->profile = $profile;
    }

    public function updateProfile(Request $request)
    {
        $data = $request->validate([

            'name' => 'required',

        ]);

       $this->profile->updateProfile($request, $data);

        return response()->json([
            'message' => 'profile updated Successfully',
        ]);
    }

    public function changePassword(Request $request)
    {
       $data = $request->validate([
        "old_password" => "required",
        "password" => "required",
        "confirm_password" => "required"
       ]);

      $profile = $this->profile->changePassword($request, $data);

      if($profile)
      {
        return response()->json([
            'message'=> 'Password Updated Successfully',
           ], 200);
      } else 
      {
        return response()->json([
            'message'=> 'Password does not match',
           ], 401);
      }
       

    }
}
