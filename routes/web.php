<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\listsuppliercontroller;
use App\Http\Controllers\ProductController;
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



Route::get('/regisproduct', [ProductController::class, 'regisindex']);
Route::post('/regisproduct', [ProductController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class, 'authenticate']);
Route::post('/logout',[LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register',[RegisterController::class, 'store']);

// Route::get('/home',[HomeController::class, 'index'])->middleware('auth');

Route::get('/', [ProductController::class, 'rekomendasiBarang'])->middleware('auth');
Route::get('/home', [ProductController::class, 'rekomendasiBarang'])->middleware('auth');

Route::get('/addsupplier', [SupplierController::class, 'index'])->middleware('auth');
Route::post('/addsupplier',[SupplierController::class, 'store'])->middleware('auth');

Route::get('/listproducts', [ProductController::class, 'index'])->middleware('auth');
Route::post('/listproducts',[ProductController::class, 'store'])->middleware('auth');

Route::get('/listsupplier', [ListSupplierController::class, 'index'])->middleware('auth');

// Route::get('/data', [ProductController::class, 'indexdata']);


Route::delete('/listsupplier/{id}', [SupplierController::class,'destroy'])->name('supplier.destroy');
Route::delete('/listproducts/{id}', [ProductController::class,'destroy'])->name('product.destroy');


Route::get('/editproduct/{id}', [ProductController::class, 'edit']);

Route::put('/editproduct/{id}', [ProductController::class,'update'])->name('product.update');


Route::get('/editsupplier/{id}', [SupplierController::class, 'edit']);

Route::put('/editsupplier/{id}', [SupplierController::class,'update'])->name('supplier.update');

