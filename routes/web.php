<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
]);

 Route::group(['middleware' => ['auth','isAdmin']], function () {

   Route::get('/dashboard', function () {
      return view('admin.index');
   })->name('dashboard');

// category routes   
Route::get('categories', [CategoryController::class, 'index'])->name('admin.category.index');

Route::get('addcategory', [CategoryController::class, 'add'])->name('admin.category.add');
Route::post('insertcategory', [CategoryController::class, 'insertCat'])->name('admin.category.insert');
Route::get('category/edit/{id}',[CategoryController::class,'editCat'])->name('admin.category.edit');
Route::post('category/update/{id}',[CategoryController::class,'updateCat'])->name('admin.category.update');
Route::get('category/delete/{id}',[CategoryController::class,'deleteCat'])->name('admin.category.delete');


///products route
Route::get('products',[ProductController::class,'product'])->name('admin.products.index');
Route::get('products/add',[ProductController::class, 'addProduct'])->name('admin.products.add');
Route::post('products/insert',[ProductController::class, 'insertProduct'])->name('admin.products.insert');
Route::get('product/edit/{id}',[ProductController::class, 'editProduct'])->name('admin.products.edit');
Route::post('product/update/{id}',[ProductController::class,'updateProduct'])->name('admin.products.update');
Route::get('product/delete/{id}',[ProductController::class,'deleteProduct'])->name('admin.products.delete');
});

  Route::get('/home', function () {
      return view('dashboard');
   })->name('userDashboard');
