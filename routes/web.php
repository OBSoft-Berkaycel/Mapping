<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocationController;

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

Route::get('/', [LocationController::class, 'index'])->name('locations.index');
Route::get('/locations/create', [LocationController::class, 'create'])->name('locations.create');
Route::post('/locations/create', [LocationController::class, 'store'])->name('locations.store');
Route::get('/locations/show/{location}', [LocationController::class, 'show'])->name('locations.show');
Route::post('/locations/show/{location}', [LocationController::class, 'update'])->name('locations.update');
Route::get('/locations/delete/{location}', [LocationController::class, 'destroy'])->name('locations.destroy');

