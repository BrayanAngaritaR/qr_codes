<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/dashboard/qr', [App\Http\Controllers\Panel\QrController::class, 'index'])->name('panel.qr.index');
Route::get('/dashboard/qr/create', [App\Http\Controllers\Panel\QrController::class, 'create'])->name('panel.qr.create');
Route::post('/dashboard/qr/create', [App\Http\Controllers\Panel\QrController::class, 'store'])->name('panel.qr.store');
