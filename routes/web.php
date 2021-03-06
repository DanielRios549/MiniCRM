<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;

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

// Authentication

Route::get('/login', [PagesController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('user/login')->middleware('guest');
Route::post('/signup', [AuthController::class, 'signup'])->name('user/signup')->middleware('guest');
Route::delete('/logout', [AuthController::class, 'logout'])->name('user/logout');

// Main

Route::get('/', [PagesController::class, 'home'])->name('home')->middleware('auth');
Route::get('/about', [PagesController::class, 'about'])->name('about')->middleware('auth');

// Clients

Route::get('/clients', [PagesController::class, 'clients'])->name('clients')->middleware('auth');
Route::get('/clients/new', [PagesController::class, 'newClient'])->name('clients/new')->middleware('auth');
Route::post('/clients/new', [ClientController::class, 'add'])->name('clients/add')->middleware('auth');
Route::get('/clients/{client}', [PagesController::class, 'editClient'])->name('clients/edit')->middleware('auth');
Route::post('/clients/{data}', [ClientController::class, 'edit'])->name('clients/edit')->middleware('auth');
Route::delete('/clients/remove/{client}', [ClientController::class, 'remove'])->name('clients/remove')->middleware('auth');

// Users

Route::get('/users', [PagesController::class, 'users'])->name('users')->middleware('auth');
Route::get('/users/new', [PagesController::class, 'newUser'])->name('users/new')->middleware('auth');
Route::post('/users/new', [UserController::class, 'add'])->name('users/add')->middleware('auth');
Route::get('/users/{user}', [PagesController::class, 'editUser'])->name('users/edit')->middleware('auth');
Route::post('/users/{data}', [UserController::class, 'edit'])->name('users/edit')->middleware('auth');
Route::delete('/users/remove/{user}', [UserController::class, 'remove'])->name('users/remove')->middleware('auth');
