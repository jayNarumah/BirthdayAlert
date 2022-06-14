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

Route::get('/email', [AdminController::class, 'mail']);

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::post('/ttt', [AuthController::class, 'ttt']);
Route::get('/sms', [SmsController::class, 'aws']);

 //Route::group(['middleware' => 'auth:sanctum',], function (){
 Route::get('/test', [NotificationController::class, 'twilioSms']);
 //});

// Route::get('/meow', [TestController::class, 'meow'])->middleware('admin');


Route::group(['middleware' => 'auth:sanctum',], function (){

    // Route::get('/meow', [TestController::class, 'meow'])->middleware('admin');

    Route::get('/admin', [AdminController::class, 'index']);
    Route::post('/admin', [AdminController::class, 'store']);
    Route::get('/admin/{id}', [AdminController::class, 'show']);
    Route::delete('/admin/{id}', [AdminController::class, 'destroy']);
    Route::put('/admin/{id}', [AdminController::class, 'update']);

    Route::get('/user-count', [AdminController::class, 'profileCount']);
    Route::get('/admin-count', [AdminController::class, 'count']);
    Route::post('/createadmin', [AdminController::class, 'createadmin']);
    Route::get('/birthdays', [BirthdayController::class, 'birthdays']);

});

Route::group(['middleware' => 'auth:sanctum',], function (){

    Route::get('/group', [GroupController::class, 'index']);
    Route::post('/group', [GroupController::class, 'store']);
    Route::get('/group/{id}', [GroupController::class, 'show']);
    Route::put('/group/{id}', [GroupController::class, 'update']);

    Route::get('/group-count', [GroupController::class, 'count']);
});


Route::group(['middleware' => 'auth:sanctum',], function (){
    Route::get('/user', [UserController::class, 'index']);
    Route::post('/user', [UserController::class, 'store']);
    Route::delete('/user/{id}', [UserController::class, 'destroy']);
    Route::put('/user/{id}', [UserController::class, 'update']);
    Route::get('/user/{id}', [UserController::class, 'show']);

    Route::get('/users-count', [UserController::class, 'count']);
    Route::get('/birthday', [BirthdayController::class, 'birthday']);

    //Route::get('/test', [TestController::class, 'index']);
});
