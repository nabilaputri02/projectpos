<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use Illuminate\Http\Request;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\AbsensiController;

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


// Route::resource('pegawai',PegawaiController::class)->except('destroy');
// Route::resource('absensi',AbsensiController::class)->except('absensi.destroy');
// Route::resource('pengguna',UserController::class)->except('destroy','create','show','update','edit');



Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::resource('/user',UserController::class)->middleware('auth');
Route::get('/user/create', [UserController::class, 'create'])->name('user.create')->middleware('auth');
Route::get('/users', [UserController::class, 'index'])->name('user.index')->middleware('auth');


Route::resource('/pegawai',PegawaiController::class)->middleware('auth');
Route::get('/pegawai/create', [PegawaiController::class, 'create'])->name('pegawai.create')->middleware('auth');
Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai.index')->middleware('auth');
Route::get('/pegawai/{id}', [PegawaiController::class, 'show'])->name('pegawai.show')->middleware('auth');
Route::put('/pegawai/{pegawai}', [PegawaiController::class, 'update'])->name('pegawai.update')->middleware('auth');


Route::resource('/absensi',AbsensiController::class)->except('destroy','create','show','update'.'edit')->middleware('auth');
Route::get('/absensi/create', [AbsensiController::class, 'create'])->name('absensi.create');
Route::post('/absensi/store', [AbsensiController::class, 'store'])->name('absensi.store');
Route::delete('/absensi/{id}', [AbsensiController::class, 'destroy'])->name('absensi.destroy')->middleware('auth');
Route::get('/absensi/{absensi}', [AbsensiController::class, 'show'])->name('absensi.show')->middleware('auth');
Route::put('/absensi/{absensi}', [AbsensiController::class, 'update'])->name('absensi.update')->middleware('auth');
// Rute untuk mencetak data absensi individu
Route::get('/absensi/cetak/{id}', [AbsensiController::class, 'printPDF'])->name('absensi.pdf')->middleware('auth');

// Rute untuk mencetak semua data absensi
Route::get('/cetak-semua-absensi', [AbsensiController::class, 'cetakSemua'])->middleware('auth');

Route::get('login',[LoginController::class,'loginView'])->name('login');
Route::post('login',[LoginController::class,'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
