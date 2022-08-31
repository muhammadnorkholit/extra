<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\extraController;
use App\Http\Controllers\categoryController;

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

// landingpage route    
Route::get('/', [LandingController::class, 'index'])->middleware('guest');

// authentication route
Route::get('/login', [AuthController::class, 'LoginUI'])->middleware('guest')->name('login');

Route::post('/login', [AuthController::class, 'authenticate']);

Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::get('/register', [AuthController::class, 'RegisterUI']);

Route::post('/registration', [AuthController::class, 'Registration']);


// dashboard route

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth']);

Route::get('/userextra', [DashboardController::class, 'UserExtra'])->middleware(['auth', 'user']);

Route::get('/pilextra', [DashboardController::class, 'pilExtra'])->middleware(['auth', 'user']);

Route::post('/pilextra', [DashboardController::class, 'pilExtraPost'])->middleware(['auth', 'user']);

Route::get('/daftarextra', [DashboardController::class, 'DaftarExtra'])->middleware(['auth', 'user']);

Route::get('/userterdaftar', [DashboardController::class, 'UserTerdaftar'])->middleware(['auth', 'admin']);

Route::post('/userterdaftar', [DashboardController::class, 'UserFilter'])->middleware(['auth', 'admin']);

Route::get('/userterdaftar/{id}', [DashboardController::class, 'ShowUser'])->middleware(['auth', 'admin']);

Route::get('/deleteuser/{id}', [DashboardController::class, 'DeleteUser'])->middleware(['auth', 'admin']);

// Route::get('/dataextrakulikuler', [DashboardController::class, 'Extra'])->middleware(['auth', 'admin']);

// Route::get('/dataextrakulikuler/{id}', [DashboardController::class, 'ExtraDesc'])->middleware(['auth', 'admin']);

Route::get('/deleteextra/{id}', [DashboardController::class, 'DeleteExtra'])->middleware(['auth', 'admin']);

Route::resource('/dataextrakulikuler', extraController::class)->middleware(['auth', 'admin']);

Route::resource('/category', categoryController::class)->middleware(['auth', 'admin']);