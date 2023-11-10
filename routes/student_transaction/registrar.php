<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentTransactionController;
// Event module
Route::get('registrar', [StudentTransactionController::class, 'index'])->name('registrar');
Route::get('cashier', [StudentTransactionController::class, 'cashier'])->name('cashier');
Route::get('display_monitor', [StudentTransactionController::class, 'display_monitor'])->name('display_monitor');
Route::get('display_serving', [StudentTransactionController::class, 'display_serving'])->name('display_serving');
Route::get('display_table', [StudentTransactionController::class, 'display_table'])->name('display_table');
Route::get('home', [StudentTransactionController::class, 'back'])->name('back');


Route::post('storeQueue', [StudentTransactionController::class, 'storequeue'])->name('storeQueue');
Route::post('/updateQueue', [StudentTransactionController::class, 'updateQueue'])->name('updateQueue');
Route::post('/updateNoShow', [StudentTransactionController::class, 'updateNoShow'])->name('updateNoShow');


Route::post('upload-video', [StudentTransactionController::class, 'uploadVideo'])->name('upload-video');
Route::post('delete-video', [StudentTransactionController::class, 'deleteVideo'])->name('delete-video');

Route::post('/call-servingQ', [StudentTransactionController::class, 'servingQ'])->name('call-servingQ');


// DISPLAY UPDATE
Route::post('/get-latest-update', [StudentTransactionController::class, 'getLatestUpdate'])->name('get-latest-update');