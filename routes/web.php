<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RepairRequestController;
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

Route::get('/', function () {
    return view('welcome');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/car', [CarController::class, 'index'])->name('car.index');
    Route::get('/car/create', [CarController::class, 'create'])->name('car.create');
    Route::post('/car/store', [CarController::class, 'store'])->name('car.store');

    Route::get('/', [RepairRequestController::class, 'index'])->name('dashboard');
    Route::get('/request/create', [RepairRequestController::class, 'create'])->name('request.create');
    Route::post('/request/store', [RepairRequestController::class, 'store'])->name('request.store');
});

require __DIR__.'/auth.php';
