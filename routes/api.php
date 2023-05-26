<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\V1\Admin\AdminContactController;
use App\Http\Controllers\V1\Admin\DashboardController;
use App\Http\Controllers\V1\Admin\VerifyEmailController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

    Route::post('register', [RegisterController::class, 'register']);
    Route::post('login', [LoginController::class, 'login']);
    Route::post('forgot-password', [ForgotPasswordController::class, 'forgotPassword']);


        //..Frontend..//

     Route::get('/', [FrontendController::class, 'allProject']);

     Route::get('/single-project/{id}', [FrontendController::class, 'getProjectById']);
     Route::get('/skill-project/{id}', [FrontendController::class, 'getProjectBySkill']);
     Route::get('/seaarch-project', [FrontendController::class, 'searchProject']);
     Route::post('/save-contact', [ContactController::class, 'save']);


    Route::group('v1')->group(function() {

      Route::group(['prefix'=> 'auth'], function() {
        Route::post('register', [RegisterController::class, 'register']);
        Route::post('login', [LoginController::class, 'login']);
        Route::post('forgot-password', [ForgotPasswordController::class, 'forgotPassword']);
     Route::group(['middleware' => 'auth:sanctum'], function() {
        Route::post('logout', [LogoutController::class, 'logout']);
        Route::post('/email/verification-notification', [VerifyEmailController::class, 'resendNotification'])->name('verification.send');
        Route::post('reset-password', [ResetPasswordController::class, 'resetPassword']); 

       });
   });

      Route::group(['prefix' => 'me', 'middleware' => 'auth:sanctum'], function() {
        Route::post('/profiles', [ProfileController::class, 'updateProfile']);
        Route::post('/change-password', [ProfileController::class, 'changePassword']);
       });


      //   //...users...//

      require __DIR__ ."/api/v1/admin/users.php";

    //  //...Skill..///

      require __DIR__ ."/api/v1/admin/skills.php";

    //  //...Projects..//

      require __DIR__ ."/api/v1/admin/projects.php";

         // ..Profiles..


      Route::get('/all-contacts', [AdminContactController::class, 'allContact']);

      Route::get('/one-contact', [AdminContactController::class, 'view']);

      Route::post('/remove-contact', [AdminContactController::class, 'remove']);

       });




