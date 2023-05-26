<?php

use App\Http\Controllers\V1\Admin\SkillController;

use Illuminate\Support\Facades\Route;

//Route::group(['middleware' => ['role:admin'], 'prefix' => 'admin'], function () {

   Route::get('/skills', [SkillController::class, 'index']);
   Route::post('/skills', [SkillController::class, 'store']);
   Route::get('/skills/{skill}', [SkillController::class, 'show']);
   Route::put('/skills/{skill}', [SkillController::class, 'update']);
   Route::DELETE('/skills/{skill}', [SkillController::class, 'destroy']);
   
   Route::get('search-skills/{search}', [SkillController::class, 'searchSkill']);

//}); 
    