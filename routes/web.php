<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


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

Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/create',[ProductController::class, 'create'])->name('create');
Route::post('create',[ProductController::class, 'store'])->name('create.store');

//Route::get('/saludo/{name}/{nickname}', 'WelcomeUserController');
