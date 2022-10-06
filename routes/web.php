<?php

use App\Http\Controllers\CashierController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
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

Route::get('/', function () {
    return view('dashboard');
});

Route::group(['prefix' => 'product'], function () {
    Route::get('/', [ProductController::class, 'index'])->name('product.index');
    Route::post('/store', [ProductController::class, 'store'])->name('product.store');
    Route::put('/update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/delete/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
});

Route::group(['prefix' => 'cashier'], function () {
    Route::get('/', [CashierController::class, 'index'])->name('cashier.index');
    Route::get('/checkout', [CashierController::class, 'checkout'])->name('checkout.index');
});

Route::group(['prefix' => 'report'], function () {
    Route::get('/', [SaleController::class, 'index'])->name('report.index');
    Route::get('/detail', [SaleController::class, 'show'])->name('detail.index');
});