<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('demo');
});
Route::get('/test-log', function () {
    Log::info('Test log at ' . now());
    return 'ok';
});
Route::get('/test-mail', [TestController::class,'testMail']);
Route::get('/kich-hoat', [TestController::class,'kichHoatMail']);
Route::get('api/auth/google/redirect', [AuthController::class, 'redirectToGoogle']);
Route::get('api/auth/google/callback', [AuthController::class, 'handleGoogleCallback']);
Route::get('api/auth/dribbble/redirect', [AuthController::class, 'redirectToDribbble']);
Route::get('api/auth/dribbble/callback', [AuthController::class, 'handleDribbbleCallback']);
