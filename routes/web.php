<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocationsController;
use App\Http\Controllers\TrasnsactionsController;
use App\Http\Controllers\VehicleTypesController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/menu', function () {
    return view('be.menu');
});



Route::resource('transaction', TrasnsactionsController::class);
Route::resource('location', LocationsController::class);
Route::resource('vehicle', VehicleTypesController::class);


Route::get('/transaction', [TrasnsactionsController::class, 'index'])->name('transaction.index');
Route::post('/transactions/enter', [TrasnsactionsController::class, 'storeEnter'])->name('transaction.storeEnter');
Route::post('/transactions/exit', [TrasnsactionsController::class, 'processExit'])->name('transaction.exit');
Route::get('/transactions/ticket/{id}', [TrasnsactionsController::class, 'downloadTicket'])->name('transaction.ticket.pdf');
Route::get('/transactions/list', [TrasnsactionsController::class, 'list'])->name('transaction.list');