<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TransferMoneyController;
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

Route::get('/', [RegisterController::class, 'create'])->name('user.create');
Route::post('/', [RegisterController::class, 'store'])->name('user.store');
Route::get('/send-otp', [RegisterController::class, 'sendOtp'])->name('send-otp');

Route::get('/transfer', [TransferMoneyController::class, 'create'])->name('transfer.create');
Route::post('/transfer', [TransferMoneyController::class, 'store'])->name('transfer.store');
