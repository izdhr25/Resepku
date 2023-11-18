<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'welcome'])->name('welcome');
Route::get('/detail/{id}', [App\Http\Controllers\HomeController::class, 'detail'])->name('detail');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/home', [App\Http\Controllers\HomeController::class, 'update'])->name('home.update');

Route::get('/resep', [App\Http\Controllers\ResepController::class, 'index'])->name('resep');
Route::post('/resep', [App\Http\Controllers\ResepController::class, 'store'])->name('resep.store');
Route::post('/resep/update/{id}', [App\Http\Controllers\ResepController::class, 'update'])->name('resep.update');
Route::post('/resep/delete/{id}', [App\Http\Controllers\ResepController::class, 'delete'])->name('resep.delete');