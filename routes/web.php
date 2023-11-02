<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\JenisLapanganController;
use App\Http\Controllers\LapanganController;
use App\Http\Controllers\LapangansController;
use App\Http\Controllers\LayoutsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PeminjamansController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// -----------------------------Route Login------------------------------
Route::resource('Login', LoginController::class)->middleware('guest');
Route::post('Login', [LoginController::class, 'authenticate'])->name('Login.check');
Route::post('Logout', [LoginController::class, 'logout'])->name('Login.logout')->middleware('auth');
Route::resource('Register', RegisterController::class)->middleware('guest');

// -----------------------------Route Layout-----------------------------
Route::get('', [LayoutsController::class, 'index'])->name('home.index');
// Route::get('/notify', [LayoutsController::class, 'notify']);
Route::resource('Home', LayoutsController::class);
Route::resource('Lapangan', LapanganController::class);
Route::resource('Event', EventController::class);
Route::get('Riwayat', [LayoutsController::class, 'riwayat'])->name('home.riwayat')->middleware('auth');
Route::put('Ulas/{id}', [LayoutsController::class, 'ulasan'])->name('ulasan.ulasan')->middleware('auth');
Route::put('us/{id}', [LayoutsController::class, 'user'])->name('user.user')->middleware('auth');
Route::get('Cetak/{id}', [LayoutsController::class, 'cetak'])->name('home.cetak');

Route::resource('Booking', PeminjamanController::class)->middleware('auth');
// Route::post('Booking', [PeminjamanController::class, 'store'])->name('Booking.store')->middleware('booking');

Route::get('/contact', function () {
    return view('layouts.contact');
})->name('Contact Us');
Route::get('/invoice', function () {
    return view('booking.invoice');
});

// Route::get('fullcalender', [FullCalenderController::class, 'index'])->name('Calender');

// ----------------------------Route Admin-------------------------------
Route::resource('Admin', DashboardController::class)->middleware('admin');
Route::resource('Lapangans', LapangansController::class)->middleware('admin');
Route::resource('Jenis', JenisLapanganController::class)->middleware('admin');
Route::resource('Bookings', PeminjamansController::class)->middleware('admin');
// Route::post('Bookings', [PeminjamansController::class, 'update'])->name('Booking.update');
Route::resource('Ulasan', UlasanController::class)->middleware('admin');
Route::resource('User', UserController::class)->middleware('admin');


//log-viewers
Route::get('log-viewers', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);
