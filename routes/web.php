<?php

use Illuminate\Support\Facades\Route;
use App\Infrastructure\Entrypoint\Rest\CarreraTaxi\Controller\CarreraTaxiController;


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

Route::prefix('carreras')->group(function () {
    Route::post('/', [CarreraTaxiController::class, 'store']);
    Route::get('/', [CarreraTaxiController::class, 'index'])->name('carreras.index');
    Route::get('/{id}', [CarreraTaxiController::class, 'show'])->name('carreras.show');
    Route::put('/{id}', [CarreraTaxiController::class, 'update'])->name('carreras.update');
    Route::delete('/{id}', [CarreraTaxiController::class, 'destroy'])->name('carreras.destroy');
});