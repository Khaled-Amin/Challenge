<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Products
Route::get('/' , [\App\Http\Controllers\ProductController::class , 'index'])->name('products_home');
Route::get('products/create' , [\App\Http\Controllers\ProductController::class , 'create'])->name('products_create');
Route::post('products/store' , [\App\Http\Controllers\ProductController::class , 'store'])->name('products_store');
Route::match(['get' , 'delete'],'products/destroy/{id}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('products.destroy');


// Units

Route::get('units' , [\App\Http\Controllers\UnitController::class , 'index'])->name('units_home');
Route::get('units/create' , [\App\Http\Controllers\UnitController::class , 'create'])->name('units_create');
Route::post('units/store' , [\App\Http\Controllers\UnitController::class , 'store'])->name('units_store');
// Route::match(['post' , 'get'],'subunit', [\App\Http\Controllers\UnitController::class , 'subunit'])->name('sub');
Route::post('supunit/', [App\Http\Controllers\UnitController::class , 'supUnit'])->name('supunit');


