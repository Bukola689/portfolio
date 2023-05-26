<?php

use App\Http\Controllers\V1\Admin\ProjectController;

use Illuminate\Support\Facades\Route;

//Route::group(['middleware' => ['role:admin'], 'prefix' => 'admin'], function () {

   Route::get('/projects', [ProjectController::class, 'index']);
   Route::post('/projects', [ProjectController::class, 'store']);
   Route::get('/projects/{project}', [ProjectController::class, 'show']);
   Route::put('/projects/{project}', [ProjectController::class, 'update']);
   Route::DELETE('/projects/{project}', [ProjectController::class, 'destroy']);
   
   Route::get('search-projects/{search}', [ProjectController::class, 'searchProject']);

//}); 
    