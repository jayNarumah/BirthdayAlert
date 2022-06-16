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

Route::get('/sms', [SmsController::class, 'aws']);
Route::get('/test', [NotificationController::class, 'twilioSms']);


Route::group(['middleware' => 'auth:sanctum',], function (){
    Route::get('/admin', [AdminController::class, 'index'])->middleware('super_admin');
    Route::post('/admin', [AdminController::class, 'store'])->middleware('super_admin');
    Route::get('/admin/{id}', [AdminController::class, 'show'])->middleware('super_admin');
    Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->middleware('super_admin');
    Route::post('/admin/{id}', [AdminController::class, 'update'])->middleware('super_admin');

    Route::get('/users-count', [AdminController::class, 'profileCount'])->middleware('super_admin');
    Route::get('/admin-count', [AdminController::class, 'count'])->middleware('super_admin');
    Route::post('/create-admin', [AdminController::class, 'createAdmin'])->middleware('super_admin');
    Route::get('/birthdays', [BirthdayController::class, 'birthdays'])->middleware('super_admin');
    Route::get('/birthdays-count', [BirthdayController::class, 'birthdayscount'])->middleware('super_admin');
});

Route::group(['middleware' => 'auth:sanctum',], function (){

    Route::get('/group', [GroupController::class, 'index'])->middleware('super_admin');
    Route::post('/group', [GroupController::class, 'store'])->middleware('super_admin');
    Route::get('/group/{id}', [GroupController::class, 'show'])->middleware('super_admin');
    Route::post('/group/{id}', [GroupController::class, 'update'])->middleware('super_admin');

    Route::get('/group-count', [GroupController::class, 'count'])->middleware('super_admin');
});

Route::group(['middleware' => 'auth:sanctum',], function (){
    Route::get('/user', [UserController::class, 'index'])->middleware('admin');
    Route::post('/user', [UserController::class, 'store'])->middleware('admin');
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->middleware('admin');
    Route::post('/user/{id}', [UserController::class, 'update'])->middleware('admin');
    Route::get('/user/{id}', [UserController::class, 'show'])->middleware('admin');

    Route::get('/user-count', [UserController::class, 'count'])->middleware('admin');
    Route::get('/birthday-count', [BirthdayController::class, 'birthdaycount'])->middleware('admin');
    Route::get('/birthday', [BirthdayController::class, 'birthday'])->middleware('admin');
});

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);



