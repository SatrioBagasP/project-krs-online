<?php

use App\Http\Controllers\DashboardAdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KhsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardDosenController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\TahunAjaranController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [UserController::class, 'index'])->name('login')->middleware('guest');
Route::post('/', [UserController::class, 'index']);
Route::post('/logout', [UserController::class, 'logout']);

Route::get('/home', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/profile', [DashboardController::class, 'profile'])->middleware('auth');
// Route::get('/krs', [DashboardController::class, 'krs'])->middleware('mhs');


Route::get('/riwayat', [DashboardController::class, 'riwayat'])->middleware('mhs');
Route::get('/dosen/kelas', [DashboardDosenController::class, 'index'])->middleware('dosen');
Route::get('/dosen/detail/{jadwal:kode_jadwal}', [DashboardDosenController::class, 'detail'])->middleware(['dosen', 'JadwalOwner']);
Route::get('/dosen/detail/mhs/{krs:id}', [DashboardDosenController::class, 'edit'])->middleware(['dosen', 'KrsOwner', 'status']);
Route::post('/dosen/nilai/store/{krs:id}', [DashboardDosenController::class, 'store'])->middleware('dosen');


Route::get('/khs', [KhsController::class, 'index'])->middleware('mhs');
Route::post('/khs/store', [KhsController::class, 'store'])->middleware(['mhs', 'status']);
Route::get('/khs/show', [KhsController::class, 'show'])->middleware('mhs');
Route::post('/khs/show', [KhsController::class, 'show'])->middleware('mhs');;

Route::delete('/khs/destroy/{krs:id}', [KhsController::class, 'destroy'])->middleware('mhs');


Route::get('/admin/listtahun', [DashboardAdminController::class, 'listtahun'])->middleware('admin');
Route::get('/admin/listdosen', [DashboardAdminController::class, 'listdosen'])->middleware('admin');
Route::get('/admin/listmahasiswa', [DashboardAdminController::class, 'listmahasiswa'])->middleware('admin');



Route::resource('tahun', TahunAjaranController::class)->middleware('admin');
Route::resource('dosen', DosenController::class)->middleware('admin');
// Route::get('/khs', [KhsController::class, 'store'])->middleware('mhs');


// Route::resource('/khs', [KhsController::class])->middleware('mhs');
// Route::resource('/khs', KhsController::class)->middleware('mhs');
