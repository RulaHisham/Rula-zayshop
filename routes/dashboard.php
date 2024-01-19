<?php


use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\OrdersController;
use App\Http\Controllers\Dashboard\ProductsController;
use Illuminate\Support\Facades\Route;

Route::prefix('dashboard-panel')->middleware(['auth', 'checkAdmin'])->name('dashboard.')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('index');

    Route::resource('categories', CategoryController::class); // 7 routes

    Route::resource('products', ProductsController::class);

    Route::get('orders/{status?}', [OrdersController::class, 'index'])->name('orders.index');
    Route::get('orders/{order}/show', [OrdersController::class, 'show'])->name('orders.show');
    // change statuses
    // status = pending, accepted, rejected
    Route::get('orders/{order}/status/{status}', [OrdersController::class, 'changeStatus'])->name('orders.status');
    // delivery_status = undelivered, delivered
    Route::get('orders/{order}/delivery/{status}', [OrdersController::class, 'changeDeliveryStatus'])->name('orders.delivery_status');
    // payment_status = unpaid, paid
    Route::get('orders/{order}/payment/{status}', [OrdersController::class, 'changePaymentStatus'])->name('orders.payment_status');
});


