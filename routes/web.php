<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'home'])->name('index');

Route::get('/product_details/{id}', [UserController::class, 'productDetails'])
    ->name('product_Details');

Route::get('/allproducts', [UserController::class, 'allProducts'])
    ->name('allproducts');

Route::get('/addtocart/{id}', [UserController::class, 'addToCart'])
    ->name('addtocart')
    ->middleware('auth', 'verified');

Route::delete('/removeproductcart/{id}', [UserController::class, 'removeFromCart'])
    ->name('productscart.delete')
    ->middleware('auth', 'verified');

Route::post('/removeproductcart', [UserController::class, 'confirmOrder'])
    ->name('confirmorder')
    ->middleware('auth', 'verified');

Route::controller(UserController::class)->middleware('auth', 'verified')
    ->group(function () {
        Route::get('stripe/{price}', 'stripe')->name('stripe');
        Route::post('stripe', 'stripePost')->name('stripe.post');
    });

Route::get('/cartproducts', [UserController::class, 'cartProducts'])
    ->middleware(['auth', 'verified'])
    ->name('cartproducts');

Route::get('/myorders', [UserController::class, 'myOrders'])
    ->middleware(['auth', 'verified'])
    ->name('myorders');

Route::get('/dashboard', [UserController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});



Route::middleware('admin')->group(function () {
    // Categories

    Route::get('/categories', [CategoryController::class, 'index'])
        ->name('categories.index');

    Route::get('/categories/create', [CategoryController::class, 'create'])
        ->name('categories.create');

    Route::post('/categories', [CategoryController::class, 'store'])
        ->name('categories.store');

    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])
        ->name('categories.edit');

    Route::put('/categories/{id}', [CategoryController::class, 'update'])
        ->name('categories.update');

    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])
        ->name('categories.delete');


    // Products
    Route::get('/viewallproducts', [ProductController::class, 'index'])
        ->name('products.index');

    Route::get('/products/create', [ProductController::class, 'create'])
        ->name('products.create');

    Route::post('/storeproducts', [ProductController::class, 'store'])
        ->name('products.store');

    Route::get('/products/{id}/edit', [ProductController::class, 'edit'])
        ->name('products.edit');

    Route::put('/products/{id}', [ProductController::class, 'update'])
        ->name('products.update');

    Route::delete('/products/{id}', [ProductController::class, 'destroy'])
        ->name('products.delete');

    Route::post('/search', [ProductController::class, 'findProduct'])
        ->name('admin.searchproduct');


    //orders
    Route::get('/orders', [AdminController::class, 'viewOrders'])
        ->name('orders');

    Route::put('/ordersstatus/{id}', [AdminController::class, 'changeStatus'])
        ->name('order.changestatus');

    Route::get('/downloadpdf/{id}', [AdminController::class, 'downloadPDF'])
        ->name('downloadpdf');
});

require __DIR__ . '/auth.php';
