<?php

use App\Http\Controllers\customerController;
use App\Http\Controllers\dashboard;
use App\Http\Controllers\gameController;
use App\Http\Controllers\KeysgamesController;
use App\Http\Controllers\MykeyController;
use App\Http\Controllers\ownerkeyController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard as HtmlDashboard;

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

// Route::resource('customer', 'customerController');
// Route::resource('game', 'gameController');
// Route::resource('keysgames', 'KeysgamesController');

Route::middleware(['auth'])->group(function () {
    Route::middleware(['role:admin'])->group(function () {
        Route::resource('customer', customerController::class);
        

        Route::resource('game', gameController::class);
        Route::resource('keygames', KeysgamesController::class);
    });
});

Route::middleware(['auth'])->group(function () {
    Route::middleware(['role:admin,guest'])->group(function () {
        Route::resource('dashboard', dashboard::class);
        Route::get('/Mykey/{id}', [dashboard::class, 'show','store'])->middleware('auth');
        // Route::get('/Mykey/{id}', [dashboard::class, 'store'])->middleware('auth');
        

    });
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');



require __DIR__ . '/auth.php';
