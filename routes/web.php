<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/product', [ProductController::class, 'index']);
Route::get('/product/create', [ProductController::class, 'create']);
Route::get('product/{id}/edit', [ProductController::class, 'edit']);
Route::put('/product/{id}/update', [ProductController::class, 'update']);
Route::get('product/{id}/delete', [ProductController::class, 'destroy']);
Route::post('/product/create', [ProductController::class, 'store']);

Route::get('/category', [CategoryController::class, 'index']);
Route::get('/category/create', [CategoryController::class, 'create']);
Route::get('/category/{id}/edit', [CategoryController::class, 'edit']);
Route::put('/category/{id}/update', [CategoryController::class, 'update']);
Route::get('/category/{id}/delete', [CategoryController::class, 'destroy']);
Route::post('/category/create', [CategoryController::class, 'store']);

Route::get('/tambahc', function(){
    $product = Product::find(1);
    $categories = [
        1,2
    ];
    $product->category()->sync($categories);
    return response()->json(Product::with('category')->get());
});