<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'home'])->name('index');

Route::get('/product_details/{id}', [UserController::class, 'productDetails'])
    ->name('product_Details');

Route::get('/allproducts', [UserController::class, 'allProducts'])
    ->name('viewallproducts');

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

    Route::get('/categories', [AdminController::class, 'index'])
        ->name('categories.index');

    Route::get('/categories/create', [AdminController::class, 'create'])
        ->name('categories.create');

    Route::post('/categories', [AdminController::class, 'store'])
        ->name('categories.store');

    Route::get('/categories/{id}', [AdminController::class, 'edit'])
        ->name('categories.edit');

    Route::put('/categories/{id}', [AdminController::class, 'update'])
        ->name('categories.update');

    Route::delete('/categories/{id}', [AdminController::class, 'destroy'])
        ->name('categories.delete');

    // Products
    Route::get('/showproducts', [AdminController::class, 'indexProducts'])
        ->name('products.index');

    Route::get('/products/create', [AdminController::class, 'createProduct'])
        ->name('products.create');

    Route::post('/storeproducts', [AdminController::class, 'storeProduct'])
        ->name('products.store');

    Route::get('/inproducts/{id}', [AdminController::class, 'editProducts'])
        ->name('products.edit');

    Route::put('/products/{id}', [AdminController::class, 'updateProduct'])
        ->name('products.update');

    Route::delete('/inproducts/{id}', [AdminController::class, 'destroyProducts'])
        ->name('products.delete');

    Route::post('/search', [AdminController::class, 'findProduct'])
        ->name('admin.searchproduct');

    Route::get('/orders', [AdminController::class, 'viewOrders'])
        ->name('orders');

    Route::put('/ordersstatus/{id}', [AdminController::class, 'changeStatus'])
        ->name('order.changestatus');

    Route::get('/downloadpdf/{id}', [AdminController::class, 'downloadPDF'])
        ->name('downloadpdf');
});

require __DIR__ . '/auth.php';
