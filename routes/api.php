<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiDokterController;

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

Route::get('/api_dokter', [ApiDokterController::class, 'index']);
Route::get('/api_dokter/{id}', [ApiDokterController::class, 'show']);
Route::post('/api_dokter', [ApiDokterController::class, 'store']);
Route::put('/api_dokter/{id}', [ApiDokterController::class, 'update']);
Route::delete('/api_dokter/{id}', [ApiDokterController::class, 'destroy']);
