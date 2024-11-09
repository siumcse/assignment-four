<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// GET /products: List all products
Route::get('/products', [ProductController::class, 'listAllProducts'])->name('products');

// GET /products/create: Show the form to create a new product
Route::get('/products/create', [ProductController::class, 'showTheFormToCreateANewProduct']);

// POST /products: Store a new product
Route::post('/products', [ProductController::class, 'storeANewProduct'])->name('store');

// GET /products/{id}: Show a specific product
Route::get('/products/{id}', [ProductController::class, 'showASpecificProduct']);

// GET /products/{id}/edit: Show the form to edit a product
Route::get('/products/{id}/edit', [ProductController::class, 'showTheFormToEditAProduct']);

// PUT /products/{id}: Update a product
Route::put('/products/{id}', [ProductController::class, 'updateAProduct'])->name('update');

// DELETE /products/{id}: Delete a product
Route::delete('/products/{id}', [ProductController::class, 'deleteAProduct'])->name('delete');  