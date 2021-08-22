<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventRulesController;

// Event Rules
Route::get('/show-event-rules/{event}/show', [EventRulesController::class, 'show'])->name('showEventRule');
Route::post('/store-event-rule', [EventRulesController::class, 'store'])->name('storeEventRule');
Route::get('/edit-event-rule/{eventrule}/edit', [EventRulesController::class, 'edit'])->name('editEventRule');
Route::put('/update-event-rule/{eventrule}', [EventRulesController::class, 'update'])->name('updateEventRule');
Route::delete('/delete-event-rule/{eventrule}', [EventRulesController::class, 'destroy'])->name('deleteEventRule');