<?php

use App\Http\Controllers\controller_transaksi;
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

Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/', function () {
    $response = app(controller_transaksi::class)->getData();
    $data = $response->original;

    return view('app', compact('data'));
})->name('app');
Route::get('/add', [controller_transaksi::class, 'addData'])->name('add');
Route::post('/add', [controller_transaksi::class, 'store'])->name('store');

Route::get('/edit/{id_transaksi}', [controller_transaksi::class, 'editData'])->name('edit');
Route::patch('/edit/{id_transaksi}', [controller_transaksi::class, 'update'])->name('update');

Route::delete('delete/{id_transaksi}', [controller_transaksi::class, 'deleteData'])->name('delete');
