<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\UserController;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('jwt.verify')->group(function () {
    Route::get('/bookings', [BookingController::class, 'index'])
        ->middleware('common:viewBooking');
    Route::get('users/bookings', [UserController::class, 'bookings'])
        ->middleware('common:viewUserBooking');
});
