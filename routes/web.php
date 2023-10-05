<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\AdminController;

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

/**
 * Admin Routes
 */
// return to views blade GET requests to index function
Route::get('admin/{origin}', [AdminController::class, 'index']);

// create get and post service api
Route::get('create/{origin}', [AdminController::class, 'create']);
Route::post('createDataRows/{origin}', [AdminController::class, 'store'])->name('createDataRows');

// billing get and post request api
Route::post('createDataRows/{origin}', [AdminController::class, 'store'])->name('createDataRows');

// authentication api
Auth::routes();

// redirect api after login
Route::get('/home', [WebController::class, 'landing'])->name('home');

/**
 * User Routes
 */

/**
 * Guest Web Routes
 */

// landing page api
Route::get('/', [WebController::class, 'landing']);
Route::post('post-form', [WebController::class, 'post'])->name('post-form');

// e-visa application api based on type
Route::get('e-visa/{origin}', [WebController::class, 'eVisa']);




