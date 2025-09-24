<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Infrastructure\Entrypoint\Rest\CarreraTaxi\Controller\CarreraTaxiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('carreras')->group(function () {
    Route::post('/', [CarreraTaxiController::class, 'store']);
    Route::get('/', [CarreraTaxiController::class, 'index'])->name('carreras.index');
    Route::get('/{id}', [CarreraTaxiController::class, 'show'])->name('carreras.show');
    Route::put('/{id}', [CarreraTaxiController::class, 'update'])->name('carreras.update');
    Route::delete('/{id}', [CarreraTaxiController::class, 'destroy'])->name('carreras.destroy');
});