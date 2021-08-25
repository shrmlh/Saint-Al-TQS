<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminUserController;
// Event module
Route::get('/user-list', [AdminUserController::class, 'index'])->name('userAdminList');
Route::get('/create-user', [AdminUserController::class, 'create'])->name('createUserAdmin');
Route::post('/store-user', [AdminUserController::class, 'store'])->name('storeAdminUser');
Route::get('/edit-user/{user}/edit', [AdminUserController::class, 'edit'])->name('editUserAdmin');
Route::put('/update-user/{user}', [AdminUserController::class, 'update'])->name('updateUserAdmin');
Route::delete('/delete-user/{user}', [AdminUserController::class, 'destroy'])->name('deleteUserAdmin');