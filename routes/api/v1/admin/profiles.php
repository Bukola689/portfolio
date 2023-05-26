<?php

use App\Http\Controllers\V1\Admin\ProfileController;

use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['role:|admin|manager|user']], function () { 
    Route::post('/profiles', [ProfileController::class, 'updateProfile']);
    Route::post('/change-password', [ProfileController::class, 'changePassword']);
 
   }); 