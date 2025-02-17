<?php

use App\Models\Bill;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BillController;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PegawaiController;

Route::resource('/', PegawaiController::class);
Route::delete('/delete/{id}', [PegawaiController::class, 'destroy']);
Route::get('/edit/{id_pegawai}', [PegawaiController::class, 'edit']);
Route::put('/update/{id}', [PegawaiController::class,'update']);

Route::resource('/menu', MenuController::class);
Route::get('/menu/{id}', [MenuController::class, 'destroy']);
Route::get('/menu/{id_menu}', [MenuController::class, 'edit']);
Route::put('/menu/{id}', [MenuController::class, 'update']);

Route::resource('/meja', MejaController::class);
Route::get('/meja/{id}', [MejaController::class, 'destroy']);
Route::get('/meja/{id_meja}', [MejaController::class, 'edit']);
Route::delete('/meja/{id}', [MejaController::class, 'update']);

Route::resource('/order', OrderController::class);

Route::get('/bill/{id_order}', '\App\Http\Controllers\BillController@index')->name('bill');
