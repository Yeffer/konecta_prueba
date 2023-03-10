<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SalesController;


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

Route::get('edit/{id}',[ProductController::class, 'edit'])->name('create.edit');
Route::patch('edit/{id}',[ProductController::class, 'update'])->name('create.update');

Route::get('delete/{id}',[ProductController::class, 'destroy'])->name('create.delete');

Route::get('sales/{id}',[SalesController::class, 'edit'])->name('sales.edit');
Route::patch('sales/{id}',[SalesController::class, 'update'])->name('sales.update');
Route::get('/sales',[SalesController::class, 'index'])->name('sales');



