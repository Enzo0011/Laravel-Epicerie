<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\faqAnswerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\IsAdminMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Auth::routes();
Route::middleware(['auth', isAdminMiddleware::class])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])
        ->name('admin.index');

    Route::resource('products', ProductsController::class)
        ->name('index', 'admin.products.index')
        ->name('create', 'admin.products.create')
        ->name('store', 'admin.products.store')
        ->name('show', 'admin.products.show')
        ->name('edit', 'admin.products.edit')
        ->name('update', 'admin.products.update')
        ->name('destroy', 'admin.products.destroy');
    Route::resource('categories', CategoryController::class);
    Route::resource('discounts', DiscountController::class);

    Route::resource('orders', OrderController::class)
        ->name('show', 'admin.orders.show');
});

Route::get('/orders/{id}', [OrderController::class, 'show'])
    ->name('orders.show');

Route::get('/products', [ProductController::class, 'index'])
    ->name('products.index');

Route::get('/products/show/{id}', [ProductController::class, 'show'])
    ->name('products.show');

Route::get('/profil', [UserController::class, 'index'])
    ->name('profil.index');

Route::put('/profil/update/{id}', [UserController::class, 'update'])
    ->name('profil.update');

Route::resource('contact', ContactController::class);

Route::get('/faqAnswer/create/{id}', [faqAnswerController::class, 'create'])
    ->name('faqAnswer.create');
Route::get('/faqAnswer/{id}', [faqAnswerController::class, 'destroy'])
    ->name('faqAnswer.destroy');
Route::post('/faqAnswer/store', [faqAnswerController::class, 'store'])
    ->name('faqAnswer.store');


Route::get('cart', [CartController::class, 'index'])
    ->name('cart')
    ->middleware('auth');

Route::post('cart/add/', [CartController::class, 'addElementToCart'])
    ->name('cart.store')
    ->middleware('auth');

Route::put('cart/update/{id}', [CartController::class, 'update'])
    ->name('cart.update')
    ->middleware('auth');

Route::delete('cart/remove/{id}', [CartController::class, 'destroy'])
    ->name('cart.destroy')
    ->middleware('auth');

Route::post('cart/promo', [CartController::class, 'addPromo'])
    ->name('cart.promo')
    ->middleware('auth');

Route::delete('cart/promo', [CartController::class, 'removePromo'])
    ->name('cart.promo.remove')
    ->middleware('auth');

Route::get('cart/checkout', [CheckoutController::class, 'checkout'])
    ->name('cart.checkout')
    ->middleware('auth');

Route::put('cart/update/{id}', [CartController::class, 'update'])
    ->name('cart.update')
    ->middleware('auth');

Route::delete('cart/remove/{id}', [CartController::class, 'destroy'])
    ->name('cart.destroy')
    ->middleware('auth');

Route::post('cart/promo', [CartController::class, 'addPromo'])
    ->name('cart.promo')
    ->middleware('auth');

Route::delete('cart/promo', [CartController::class, 'removePromo'])
    ->name('cart.promo.remove')
    ->middleware('auth');

Route::post('cart/checkout', [CartController::class, 'checkout'])
    ->name('cart.checkout')
    ->middleware('auth');

Route::put('cart/update/{id}', [CartController::class, 'update'])
    ->name('cart.update')
    ->middleware('auth');

Route::delete('cart/remove/{id}', [CartController::class, 'destroy'])
    ->name('cart.destroy')
    ->middleware('auth');

Route::post('cart/promo', [CartController::class, 'addPromo'])
    ->name('cart.promo')
    ->middleware('auth');

Route::delete('cart/promo', [CartController::class, 'removePromo'])
    ->name('cart.promo.remove')
    ->middleware('auth');

Route::get('cart/checkout/validate', [CheckoutController::class, 'validateOrder'])
    ->name('cart.checkout.validate')
    ->middleware('auth');
