<?php

use App\Http\Controllers\StationController;
use Illuminate\Support\Facades\Route;

// Event Stations
Route::get('/show-event-station/{event}/show', [StationController::class, 'show'])->name('showEventStation');
Route::post('/store-event-station', [StationController::class, 'store'])->name('storeEventStation');
Route::get('/edit-event-station/{eventstation}/edit', [StationController::class, 'edit'])->name('editEventStation');
Route::put('/update-event-station/{eventstation}', [StationController::class, 'update'])->name('updateEventStation');
Route::delete('/delete-event-station/{eventstation}', [StationController::class, 'destroy'])->name('deleteEventStation');