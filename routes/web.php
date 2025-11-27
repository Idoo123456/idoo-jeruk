<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\MultipleuploadsController;
use Illuminate\Support\Facades\Auth;

// ROUTE DASAR
Route::get('/', function () {
    return view('welcome');
});

Route::get('/pcr', function () {
    return 'Selamat Datang di Website Kampus PCR!';
});

Route::get('/mahasiswa', function () {
    return 'Halo Para Mahasiswa';
})->name('mahasiswa.show');

Route::get('/nama/{param1?}', function ($param1 = '') {
    return 'Nama saya: ' . $param1;
});

Route::get('/mahasiswa/{param1}', [MahasiswaController::class, 'show']);

Route::get('/about', function () {
    return view('halaman-about');
})->name('route.about');

Route::get('/home', [HomeController::class, 'index'])->name('home');

// QUESTION
Route::post('question/store', [QuestionController::class, 'store'])->name('question.store');

// DASHBOARD
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

// RESOURCE ROUTES
Route::resource('pelanggan', PelangganController::class);
Route::resource('user', UserController::class);

// ===============================
//      PROFILE (FIXED & CLEAN)
// ===============================
Route::middleware('auth')->group(function () {

    // Tampilkan profil
    Route::get('/profile/show', [ProfileController::class, 'show'])
        ->name('profile.pictures');

    // Form edit profil
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    // Update foto profil
    Route::put('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    // Hapus foto profil
    Route::delete('/profile/delete', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

// TEST LOGIN MANUAL
Route::get('/test-login', function () {
    Auth::loginUsingId(1);
    return "Logged in!";
});

// MULTIPLE UPLOADS
Route::get('/multipleuploads', [MultipleuploadsController::class, 'index'])
    ->name('uploads');

Route::post('/save', [MultipleuploadsController::class, 'store'])
    ->name('uploads.store');
