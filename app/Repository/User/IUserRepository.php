<?php

namespace App\Repositories\Profile;

use App\Models\User;

use Illuminate\Http\Request;

interface IUpdateProfileRepository
{
    public function storeUser(array $data);

    public function UpdateUser(User $user, array $data);

    public function deleteUser(User $user);
}