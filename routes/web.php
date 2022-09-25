<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\Controller as ControllerAlias;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [FlatController::class, 'all']);

Route::get('/applications',[ApplicationController::class,'all'])
    ->middleware('auth')
    ->name('applications');

Route::get('/addflat', [FlatController::class, 'create'])
    ->middleware('auth')
    ->name('addflat');

Route::get('/addapplication', [ApplicationController::class, 'create'])
    ->middleware('auth')
    ->name('addapplication');

Route::post('/addflat', [FlatController::class, 'add'])
    ->middleware('auth');

Route::post('/addapplication', [ApplicationController::class, 'add'])
    ->middleware('auth');

Route::get('/login', [AuthController::class, 'create'])
    ->middleware('guest')
    ->name('login');

Route::post('/logout', [AuthController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::post('/login', [AuthController::class, 'store'])
    ->middleware('guest');
