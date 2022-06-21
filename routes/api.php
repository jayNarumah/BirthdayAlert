<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthController;
use \App\Http\Controllers\AdminController;
use \App\Http\Controllers\EmailController;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\GroupController;
use \App\Http\Controllers\BirthdayController;
use \App\Http\Controllers\TestController;
use \App\Http\Controllers\NotificationController;
use \App\Http\Controllers\SmsController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/login', [AuthController::class, 'login']);


Route::get('/sms', [SmsController::class, 'aws']);
Route::get('/crone-job-test', [BirthdayController::class, 'dailyBirthday']);
Route::get('/test', [NotificationController::class, 'twilioSms']);

Route::group(['middleware' => 'auth:sanctum',], function (){
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::group(['middleware' => 'auth:sanctum',], function (){
    Route::get('/admin', [AdminController::class, 'index']);
    Route::post('/admin', [AdminController::class, 'store']);
    Route::get('/admin/{id}', [AdminController::class, 'show']);
    Route::delete('/admin/{id}', [AdminController::class, 'destroy']);
    Route::post('/admin/{id}', [AdminController::class, 'update']);

    Route::get('/users-count', [AdminController::class, 'profileCount']);
    Route::get('/admin-count', [AdminController::class, 'count']);
    Route::post('/create-admin', [AdminController::class, 'createAdmin']);
    Route::get('/birthdays', [BirthdayController::class, 'birthdays']);
    Route::get('/birthdays-count', [BirthdayController::class, 'birthdayscount']);
});

Route::group(['middleware' => 'auth:sanctum',], function (){

    Route::get('/group', [GroupController::class, 'index']);
    Route::post('/group', [GroupController::class, 'store']);
    Route::get('/group/{id}', [GroupController::class, 'show']);
    Route::post('/group/{id}', [GroupController::class, 'update']);
    Route::delete('/group/{id}', [GroupController::class, 'destroy']);

    Route::get('/group-count', [GroupController::class, 'count']);
});

Route::group(['middleware' => 'auth:sanctum',], function (){
    Route::get('/user', [UserController::class, 'index']);
    Route::post('/user', [UserController::class, 'store']);
    Route::delete('/user/{id}', [UserController::class, 'destroy']);
    Route::post('/user/{id}', [UserController::class, 'update']);
    Route::get('/user/{id}', [UserController::class, 'show']);

    Route::get('/user-count', [UserController::class, 'count']);
    Route::get('/birthday-count', [BirthdayController::class, 'birthdaycount']);
    Route::get('/birthday', [BirthdayController::class, 'birthday']);
});




