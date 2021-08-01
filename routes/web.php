<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware'=>'prevent-back-history'], function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->middleware(['auth', 'admin'])->name('admin');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'rider'])->name('dashboard');
});
require __DIR__.'/auth.php';
