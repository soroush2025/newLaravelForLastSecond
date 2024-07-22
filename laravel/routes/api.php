<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


use App\Http\Controllers\ActivityController;
use App\Http\Controllers\BookingController;


Route::apiResource('activities', ActivityController::class)->middleware('auth:sanctum');
Route::apiResource('bookings', BookingController::class)->middleware('auth:sanctum');
