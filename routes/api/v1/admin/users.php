<?php

use App\Http\Controllers\V1\Admin\UserController;

use Illuminate\Support\Facades\Route;

//Route::group(['middleware' => ['role:admin'], 'prefix' => 'admin'], function () {

   Route::get('/users', [UserController::class, 'allUser']);
   Route::post('/users', [UserController::class, 'create']);
   Route::get('/users/{user}', [UserController::class, 'viewUser']);
   Route::patch('/users/{user}', [UserController::class, 'update']);
   Route::DELETE('/users/{user}', [UserController::class, 'remove']);
   Route::post('users/{id}/suspend', [UserController::class, 'suspend']);
   Route::post('users/{id}/active', [UserController::class, 'active']);
   Route::get('users/{id}/roles', [AdminRoleController::class, 'show']);
   Route::get('users/{id}/permissions', [AdminPermissionController::class, 'show']);
   Route::post('users/{id}/roles', [AdminRoleController::class, 'changeRole']);
   
   Route::get('search-users/{search}', [UserController::class, 'searchProduct']);

//}); 
    