<?php

use App\Http\Controllers\AppartmentController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [AppartmentController::class, 'index'])->name('appartment.index');

Route::get('/application/create/{appartment}', [ApplicationController::class, 'create'])->name('application.create');
Route::post('/application/store', [ApplicationController::class, 'store'])->name('application.store');

Route::middleware('auth')->group(function () {

    Route::resource('application', ApplicationController::class)
        ->except(['create', 'store', 'show']);

    Route::post('/logout', [AuthController::class, 'destroy'])
        ->name('logout');

    Route::resource('appartment', AppartmentController::class)
        ->except(['index', 'show']);
});

Route::resource('/login', AuthController::class)
    ->only(['index', 'store'])
    ->middleware('guest');
