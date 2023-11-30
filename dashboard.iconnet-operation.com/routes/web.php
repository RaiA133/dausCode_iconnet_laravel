<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mainController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;


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


Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login/authenticate', [LoginController::class, 'authenticate'])->name('authenticate');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


Route::middleware(['auth'])->group(function () {
  Route::get('/', function () {return redirect('/dashboard');});
  Route::get('/dashboard', [mainController::class, 'dashboard']);
  Route::get('/dashboard/{region}', [mainController::class, 'dashboard']);

  Route::get('/fetchDataFromGoogleSheets', [mainController::class, 'fetchDataFromGoogleSheets']);
});

Route::middleware(['auth', 'role:Administrator'])->group(function () {
  Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
  Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
  Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');
  Route::get('/admin/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
  Route::put('/admin/update/{id}', [AdminController::class, 'update'])->name('admin.update');
  Route::delete('/admin/destroy/{id}', [AdminController::class, 'delete'])->name('admin.destroy');
});


