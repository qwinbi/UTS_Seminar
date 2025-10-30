<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/seminars', [HomeController::class, 'seminars'])->name('seminars');

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Guest Routes
Route::middleware(['auth', 'guest'])->group(function () {
    Route::get('/guest/dashboard', [GuestController::class, 'dashboard'])->name('guest.dashboard');
    Route::get('/guest/seminar/{seminar}', [GuestController::class, 'showSeminar'])->name('guest.seminar.show');
    Route::post('/guest/seminar/{seminar}/register', [GuestController::class, 'registerSeminar'])->name('guest.seminar.register');
    Route::get('/guest/my-registrations', [GuestController::class, 'myRegistrations'])->name('guest.my-registrations');
});

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    // Seminar Routes
    Route::get('/seminars', [AdminController::class, 'seminars'])->name('admin.seminars');
    Route::get('/seminars/create', [AdminController::class, 'createSeminar'])->name('admin.seminars.create');
    Route::post('/seminars', [AdminController::class, 'storeSeminar'])->name('admin.seminars.store');
    Route::get('/seminars/{seminar}/edit', [AdminController::class, 'editSeminar'])->name('admin.seminars.edit');
    Route::put('/seminars/{seminar}', [AdminController::class, 'updateSeminar'])->name('admin.seminars.update');
    Route::delete('/seminars/{seminar}', [AdminController::class, 'destroySeminar'])->name('admin.seminars.destroy');
    
    // Registration Routes
    Route::get('/registrations', [AdminController::class, 'registrations'])->name('admin.registrations');
    Route::delete('/registrations/{registration}', [AdminController::class, 'destroyRegistration'])->name('admin.registrations.destroy');
    
    // About Routes
    Route::get('/about', [AdminController::class, 'about'])->name('admin.about');
    Route::put('/about', [AdminController::class, 'updateAbout'])->name('admin.about.update');
});