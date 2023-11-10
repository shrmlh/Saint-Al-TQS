<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrarController;

Route::get('admin/registrar_queue', [RegistrarController::class, 'queue'])->name('registrar_queue');
Route::get('admin/registrar_reports', [RegistrarController::class, 'reports'])->name('registrar_reports');
Route::get('admin/registrar_display', [RegistrarController::class, 'display'])->name('registrar_display');
Route::get('admin/registrar_user', [RegistrarController::class, 'register'])->name('registrar_user');



