<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\EventController;
use App\Http\Controllers\StudentTransactionController;

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

Route::group(['middleware'=>['auth', 'admin', 'prevent-back-history']], function () {
    
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin');

    // require __DIR__.'/admin/events.php';
    // require __DIR__.'/admin/eventrules.php';
    // require __DIR__.'/admin/eventfreebies.php';
    // require __DIR__.'/admin/eventstations.php';
    require __DIR__.'/admin/useradmin.php';
    // require __DIR__.'/admin/rideruser.php';
    require __DIR__.'/admin/registrar.php';
});

Route::group(['middleware'=>['auth', 'rider', 'prevent-back-history']], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

require __DIR__.'/auth.php';
require __DIR__.'/student_transaction/registrar.php';

// Route::post('/call-servingQ', [StudentTransactionController::class, 'servingQ'])->name('call-servingQ');