<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\cakeController;
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


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
route::group(['middleware'=>'cakeAdmin_mw'],function(){
    Route::get('/cake/create', [App\Http\Controllers\cakeController::class, 'create'])->name('cake.create');
    Route::get('/cake/index', [App\Http\Controllers\cakeController::class, 'index'])->name('cake.index');
    Route::post('/cake/store', [App\Http\Controllers\cakeController::class, 'store'])->name('cake.store');
    Route::put('/cake/{id}/update', [App\Http\Controllers\cakeController::class, 'update'])->name('cake.update');
    Route::get('/cake/{id}/edit', [App\Http\Controllers\cakeController::class, 'edit'])->name('cake.edit');
    Route::delete('/cake/{id}/delete', [App\Http\Controllers\cakeController::class, 'destroy'])->name('cake.delete');

});

