<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RoomController;
use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\FloorController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Public - Browse rooms
Route::get('/rooms', [RoomController::class, 'index']);
Route::get('/rooms/{room}', [RoomController::class, 'show']);
Route::get('/rooms/{room}/availability', [RoomController::class, 'checkAvailability']);
Route::get('/floors', [FloorController::class, 'index']);

// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('/logout', [AuthController::class, 'logout']);

    // Bookings - User
    Route::get('/bookings', [BookingController::class, 'index']);
    Route::post('/bookings', [BookingController::class, 'store']);
    Route::get('/bookings/{booking}', [BookingController::class, 'show']);
    Route::put('/bookings/{booking}/cancel', [BookingController::class, 'cancel']);

    // Admin only routes
    Route::middleware('admin')->group(function () {
        // Room Management
        Route::post('/rooms', [RoomController::class, 'store']);
        Route::put('/rooms/{room}', [RoomController::class, 'update']);
        Route::delete('/rooms/{room}', [RoomController::class, 'destroy']);

        // Booking Management
        Route::get('/admin/bookings', [BookingController::class, 'adminIndex']);
        Route::put('/bookings/{booking}/approve', [BookingController::class, 'approve']);
        Route::put('/bookings/{booking}/reject', [BookingController::class, 'reject']);

        // Floor Management
        Route::post('/floors', [FloorController::class, 'store']);
        Route::put('/floors/{floor}', [FloorController::class, 'update']);
        Route::delete('/floors/{floor}', [FloorController::class, 'destroy']);
    });
});
