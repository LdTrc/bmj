<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\listsuppliercontroller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReminderController;
use App\Http\Controllers\DatalistController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\UnitsController;
use App\Http\Controllers\datasuppController;
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

Route::get('/home',[HomeController::class, 'index'])->middleware('auth');

// buat test
Route::get('/', [InventoryController::class, 'index'])->middleware('auth');
//

Route::get('/home', [ProductController::class, 'rekomendasiBarang'])->middleware('auth');

// Route::get('/', [SupplierController::class, 'algoritma'])->middleware('auth');

Route::get('/reminder', [ReminderController::class, 'index'])->middleware('auth');
Route::get('/list', [ProductController::class, 'index'])->middleware('auth');

Route::get('/datasupp', [SupplierController::class, 'rekomendasiSupplierAlgoritma'])->middleware('auth');

Route::get('/addsupplier', [SupplierController::class, 'index'])->middleware('auth');
Route::post('/addsupplier',[SupplierController::class, 'store'])->middleware('auth');

Route::get('/listproducts', [ProductController::class, 'index'])->middleware('auth');
Route::post('/listproducts',[ProductController::class, 'store'])->middleware('auth');

Route::get('/listsupplier', [ListSupplierController::class, 'index'])->middleware('auth');

// Route::get('/data', [ProductController::class, 'indexdata']);

Route::get('/addunits', [UnitsController::class, 'create'])->middleware('auth');
Route::post('/addunits',[UnitsController::class, 'store'])->middleware('auth');

Route::get('/addsupp', [datasuppController::class, 'create'])->middleware('auth');
Route::post('/addsupp',[datasuppController::class, 'store'])->middleware('auth');

Route::get('/listunits',[UnitsController::class, 'index'])->middleware('auth');


Route::get('/listsupp',[datasuppController::class, 'index'])->middleware('auth');


Route::delete('/listsupplier/{id}', [SupplierController::class,'destroy'])->name('supplier.destroy');
Route::delete('/listproducts/{id}', [ProductController::class,'destroy'])->name('product.destroy');


Route::delete('/listsupp/{id}', [datasuppController::class,'destroy'])->name('supplier.destroy');

Route::get('/editsupp/{id}', [datasuppController::class, 'edit']);
Route::put('/editsupp/{id}', [datasuppController::class,'update'])->name('datasupp.update');

Route::get('/editproduct/{id}', [ProductController::class, 'edit']);
Route::put('/editproduct/{id}', [ProductController::class,'update'])->name('product.update');

Route::get('/editsupplier/{id}', [SupplierController::class, 'edit']);
Route::put('/editsupplier/{id}', [SupplierController::class,'update'])->name('supplier.update');

Route::get('/editunits/{id}', [UnitsController::class, 'edit']);
Route::put('/editunits/{id}', [UnitsController::class,'update'])->name('units.update');

Route::get('/addinventory', [InventoryController::class, 'addindex'])->middleware('auth');
Route::post('/addinventory',[InventoryController::class, 'addInventory'])->middleware('auth');

Route::get('/editinventory/{id}', [InventoryController::class, 'editindex'])->middleware('auth');
Route::post('/editinventory',[InventoryController::class, 'editInventory'])->middleware('auth');
Route::put('/editinventory/{id}', [InventoryController::class,'updateinventory'])->name('inventory.update');

