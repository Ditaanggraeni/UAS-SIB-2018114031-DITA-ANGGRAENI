<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatkulController;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\KontrakController;
use App\Http\Controllers\JadwalController;


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

Route::get('/', [MahasiswaController::class, 'index']);
Route::resources([
    'mahasiswa' => MahasiswaController::class,
    'matkul' => MatkulController::class,
    'absen' => AbsenController::class,
    'semester' => SemesterController::class,
    'kontrak' => KontrakController::class,
    'jadwal' => JadwalController::class,
    ]);
    Route::get('/jadwal/addmatkul/{jadwals}', [JadwalController::class, 'addmatkul']);
    Route::put('/jadwal/addmatkul/{jadwals}', [JadwalController::class, 'updateaddmatkul']);
    Route::put('/jadwal/deleteaddmatkulr/{jadwals}', [JadwalController::class, 'deleteaddmatkul']);
