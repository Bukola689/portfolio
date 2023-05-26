<?php

namespace App\Repository\Profile;

use App\Models\User;

use Illuminate\Http\Request;

interface IUpdateProfileRepository
{
    public function updateProfile(Request $request, array $data);

    public function changePassword(Request $request, array $data);
}