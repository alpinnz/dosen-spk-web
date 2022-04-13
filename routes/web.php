<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\BobotController;
use App\Http\Controllers\ProsesController;

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

Route::get('/', function () {
    return view('dashboard');
});

Route::resource('dosen', DosenController::class);
Route::resource('bobot', BobotController::class);
Route::get('perhitungan', [ProsesController::class, 'perhitunganPage']);
Route::get('rangking', [ProsesController::class, 'RangkingPage']);
