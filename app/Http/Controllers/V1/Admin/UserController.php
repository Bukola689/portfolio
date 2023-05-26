<?php

namespace App\Http\Controllers\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserController extends Controller
{
    public function allUser()
    {
        $allUsers = User::orderBy('id', 'desc')->paginate(5);

        return UserResource::collection($allUsers);

    }

    public function create(StoreUserRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json([
            'status' => 'User Created By Admin Was Successfully',
            'user' => $user
        ]);
    }

    public function viewUser(User $user)
    {
    
        return response()->json([
            'user' => $user
        ]);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->name = $request->name;
        $user->update();

        return response()->json([
            'status' => 'User Updated By Admin Was Successfully',
            'user' => $user
        ]);
    }

    public function remove(User $user)
    {
      $user = $user->delete();

        return response()->json([
            'status' => 'User Removed Succesfully',
            'user' => $user
        ]);
    }

    public function suspend($id)
    {
       $user = User::find($id);

       if(! $user) {
           throw new NotFoundHttpException('user not found');
        }

        $user->active = false;
        $user->save();

        return response()->json([
           'message' => 'User Suspended Successfully'
        ]);
    }

    public function active($id)
    {

       $user = User::find($id);

       if(! $user) {
           throw new NotFoundHttpException('user not found');
        }

        $user->active = true;
        $user->save();

        return response()->json([
           'message' => 'User Been Active Successfully'
        ]);
    }
}
