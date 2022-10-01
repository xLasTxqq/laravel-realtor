<?php

use App\Http\Controllers\AppartmentController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ApplicationController2;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FlatController;
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

// Route::get('/', [FlatController::class, 'all']);

Route::get('/', [AppartmentController::class, 'index'])->name('appartment.index');

Route::get('/application/create/{appartment}',[ApplicationController2::class,'create'])->name('application.create');
Route::post('/application/store',[ApplicationController2::class,'store'])->name('application.store');
// Route::resource('application', ApplicationController2::class)->only(['create', 'store'])->scoped(['application'=>'id']);

Route::middleware('auth')->group(function () {

    Route::resource('application', ApplicationController2::class)
        ->except(['create', 'store','show']);

    Route::post('/logout', [AuthController::class, 'destroy'])
        ->name('logout');

    Route::resource('appartment', AppartmentController::class)
        ->except(['index','show']);
});

Route::resource('/login', AuthController::class)
    ->only(['index', 'store'])
    ->middleware('guest');




// Route::get('/applications', [ApplicationController::class, 'all'])
//     ->middleware('auth')
//     ->name('applications');

// Route::get('/addflat', [FlatController::class, 'create'])
//     ->middleware('auth')
//     ->name('addflat');

// Route::get('/addapplication', [ApplicationController::class, 'create'])
//     ->middleware('auth')
//     ->name('addapplication');

// Route::post('/addflat', [FlatController::class, 'add'])
//     ->middleware('auth');

// Route::post('/addapplication', [ApplicationController::class, 'add'])
//     ->middleware('auth');
