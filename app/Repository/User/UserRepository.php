<?php

namespace App\Repositories\Profile;

use App\Events\Profile\ChangePassword;
use App\Events\Profile\UpdateProfile;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class UserRepository implements UserRepository
{
   public function storeUser(array $data)
   {
       $user = User::create([
           'name' => $data['name'],
           'email' => $data['email'],
           'password' => Hash::make($data['password']),
       ]);

      // event(new UserCreated($user));

   }

   public function UpdateUser(User $user, array $data)
   {
       $user->update([
           'name' => $data['name'],
       ]);

      // event(new UserUpdated($user));
       
   }

   public function deleteUser(User $user)
   {
        $user->delete();

      // event(new UserDeleted($user));
   }
}