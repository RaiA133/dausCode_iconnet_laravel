<?php

use App\Http\Controllers\mainController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [mainController::class, 'dashboard']);
Route::get('/halaman2', [mainController::class, 'halaman2']);
Route::get('/dev/{asd}', [mainController::class, '_dashboard']);
// Route::post('/dev', [mainController::class, '_dashboard']);
