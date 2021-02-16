<?php

use App\Http\Controllers\Api\MahasiswaController;
use App\Http\Controllers\Api\MatkulController;
use App\Http\Controllers\Api\AbsenController;
use App\Http\Controllers\Api\SemesterController;
use App\Http\Controllers\Api\KontrakController;
use App\Http\Controllers\Api\JadwalController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('/', [MahasiswaController::class, 'index']);
//Route::resource('mahasiswa', MahasiswaController::class);
Route::resources([
    'mahasiswa' => MahasiswaController::class,
    'matkul' => MatkulController::class,
    'absen' => AbsenController::class,
    'semester' => SemesterController::class,
    'kontrak' => KontrakController::class,
    'jadwal' => JadwalController::class,
    ]); 
