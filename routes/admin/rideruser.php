<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RiderUserController;
// Event module
Route::get('/rider-list', [RiderUserController::class, 'index'])->name('userRiderList');
Route::get('/edit-rider/{rider}/edit', [RiderUserController::class, 'edit'])->name('editUserRider');
Route::put('/update-rider/{rider}', [RiderUserController::class, 'update'])->name('updateUserRider');