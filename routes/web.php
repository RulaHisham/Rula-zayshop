<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\ProductsController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\CheckoutController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Front\OrderController;
use App\Http\Controllers\Front\OrderDetailController;
use App\Http\Controllers\Front\UserController;
use App\Http\Controllers\ProfileController;
use App\Models\Order;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::controller(FrontController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/shop', 'shop')->name('shop');
    Route::get('/product/{id}', 'showProduct')->name('product.show');
});

Route::get('/', function () {
    return view('frontend.index');
});

Route::get('Home', function () {
    return view('frontend.index');
});
Route::get('about', function () {
    return view('frontend.about');
});
Route::get('contact', function () {
    return view('frontend.contact');
});

Route::get('single-product', function () {
    return view('frontend.single-product');
});
Route::get('index', function () {
    return view('dashboard.index');
});
ROute::middleware(['auth'])->group(function () {

    Route::controller(CartController::class)->prefix('cart')->name('cart.')->group(function () {
        Route::get('/', 'index')->name('show');
        Route::get('/add/{id}', 'addToCartSession')->name('addToSession');
    });

    Route::controller(CheckoutController::class)->prefix('checkout')->name('checkout.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
    });

});
Route::middleware(['auth'])->group(function () {
    Route::get('order/{status?}', [OrderDetailController::class, 'index'])->name('front.orders.index');
    Route::get('order/{order}/show', [OrderDetailController::class, 'show'])->name('front.orders.show');
});






Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/dashboard.php';

