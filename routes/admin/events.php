<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
// Event module
Route::get('/event-list', [EventController::class, 'index'])->name('eventsList');
Route::get('/create-event', [EventController::class, 'create'])->name('createEvent');
Route::post('/store-event', [EventController::class, 'store'])->name('storeEvent');