<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\AdminDashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Landing Page
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// User Dashboard Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Booking routes with consistent naming
    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::get('/booking/create', [DashboardController::class, 'showBookingForm'])->name('booking.create');
        Route::post('/booking/store', [DashboardController::class, 'storeBooking'])->name('booking.store');
    });
});

// Admin Dashboard Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/bookings', [AdminDashboardController::class, 'bookings'])->name('bookings');
    Route::patch('/bookings/{booking}/approve', [AdminDashboardController::class, 'approveBooking'])->name('bookings.approve');
    Route::patch('/bookings/{booking}/reject', [AdminDashboardController::class, 'rejectBooking'])->name('bookings.reject');
    Route::get('/rooms', [AdminDashboardController::class, 'rooms'])->name('rooms');
    Route::get('/users', [AdminDashboardController::class, 'users'])->name('users');
});
