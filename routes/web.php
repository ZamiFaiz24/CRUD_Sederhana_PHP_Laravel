<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\GudangController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/gudang/{id}/edit', [GudangController::class, 'edit'])->name('gudang.edit');
Route::put('/gudang/{id}', [GudangController::class, 'update'])->name('gudang.update');

Route::resource('gudang', GudangController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
