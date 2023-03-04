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

Route::get('/dashboard', [App\Http\Controllers\Panel\DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

require __DIR__ . '/auth.php';

Route::get('/dashboard/qr', [App\Http\Controllers\Panel\QrController::class, 'index'])->name('panel.qr.index');
Route::get('/dashboard/qr/create', [App\Http\Controllers\Panel\QrController::class, 'create'])->name('panel.qr.create');
Route::post('/dashboard/qr/create', [App\Http\Controllers\Panel\QrController::class, 'store'])->name('panel.qr.store');
Route::get('/dashboard/qr/{code}/edit', [App\Http\Controllers\Panel\QrController::class, 'edit'])->name('panel.qr.edit');
Route::post('/dashboard/qr/{code}/edit', [App\Http\Controllers\Panel\QrController::class, 'update'])->name('panel.qr.update');
Route::delete('/dashboard/qr/{code}/destroy', [App\Http\Controllers\Panel\QrController::class, 'destroy'])->name('panel.qr.destroy');


Route::get('/{code}', [App\Http\Controllers\User\QrController::class, 'show'])->name('user.qr.show');
