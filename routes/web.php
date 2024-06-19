<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KNNController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataPointController;

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

// Route::get('/welcome', function () {
//     return view('welcome');
// });

// Home Dashboard
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Costumize
Route::get('/costumize', [DataPointController::class, 'index'])->name('data-point');
Route::get('/costumize/create', [DataPointController::class, 'create'])->name('data-point');
Route::post('/costumize/create', [DataPointController::class, 'store']);
Route::get('/costumize/{id}/edit', [DataPointController::class, 'edit']);
Route::put('/costumize/{id}/edit', [DataPointController::class, 'update']);
Route::get('/costumize/{id}/delete', [DataPointController::class, 'destroy']);

// Classify
Route::match(['get', 'post'], '/classify', [KNNController::class, 'classify'])->name('classify');