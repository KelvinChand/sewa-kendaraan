<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\controller_transaksi;

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
Route::get('/transaksi', [controller_transaksi::class , 'index']);
Route::post('/transaksi', [controller_transaksi::class, 'store']);
Route::get('/transaksi/{id}', [controller_transaksi::class, 'show']);
Route::put('/transaksi/{id}', [controller_transaksi::class, 'update']);
Route::delete('/transaksi/{id}', [controller_transaksi::class, 'destroy']);
