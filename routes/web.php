<?php

use App\Http\Livewire;
use App\Http\Livewire\LogTable;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KurirController;
use App\Http\Controllers\ShipmentController;

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

Route::get('/', [AuthController::class, 'index'])->name('login');

Route::post('login', [AuthController::class, 'authenticate'])->name('auth');

Route::get('/logout', [AuthController::class, 'logout']);

Route::middleware(['auth.basic'])->group(function () {

    // Master Data
    Route::get('/dashboard', [KurirController::class,'index']);

    // Kurir Dashboard
    Route::get('/log-kurir', LogTable::class);
    // Route::post('log-kurir', [ShipmentController::class, 'store'])->name('Shipment.store');
});
