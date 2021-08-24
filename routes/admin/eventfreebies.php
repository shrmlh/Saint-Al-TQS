<?php

use App\Http\Controllers\EventFreebiesController;
use Illuminate\Support\Facades\Route;

// Event Freebies
Route::get('/show-event-freebies/{event}/show', [EventFreebiesController::class, 'show'])->name('showEventFreebie');
Route::post('/store-event-freebie', [EventFreebiesController::class, 'store'])->name('storeEventFreebie');
Route::get('/edit-event-freebie/{eventfreebie}/edit', [EventFreebiesController::class, 'edit'])->name('editEventFreebie');
Route::put('/update-event-freebie/{eventfreebie}', [EventFreebiesController::class, 'update'])->name('updateEventFreebie');
Route::delete('/delete-event-freebie/{eventfreebie}', [EventFreebiesController::class, 'destroy'])->name('deleteEventFreebie');