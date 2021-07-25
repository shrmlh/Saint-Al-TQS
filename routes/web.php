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

Route::get('/dashboard', function () {
    $role=Auth::user()->role;
    if ($role=='1') {
        return view('admin.dashboard');
    } else {
        return view('dashboard');
    }
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('redirects', 'App\Http\Controllers\HomeController@index');

require __DIR__.'/auth.php';
