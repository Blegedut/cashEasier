<?php

use App\Http\Controllers\CashierController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;

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
    return redirect('/login');
});

Route::group(['prefix' => 'product'], function () {
    Route::get('/', [ProductController::class, 'index'])->name('product.index');
    Route::get('/search', [ProductController::class, 'search'])->name('product.search');
    Route::get('/show/{id}', [ProductController::class, 'show'])->name('product.show');
    Route::post('/store', [ProductController::class, 'store'])->name('product.store');
    Route::put('/update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/delete/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
});

Route::group(['prefix' => 'cashier'], function () {
    Route::get('/', [CashierController::class, 'index'])->name('cashier.index');
    Route::get('/checkout', [CashierController::class, 'checkout'])->name('cashier.checkout');
});

Route::group(['prefix' => 'transaction'], function () {
    Route::post('/', [TransactionController::class, 'store'])->name('transaction.index');
    Route::put('/update/{id}', [TransactionController::class, 'update'])->name('transaction.update');
    Route::delete('/delete/{id}', [TransactionController::class, 'destroy'])->name('transaction.destroy');
});

Route::group(['prefix' => 'report'], function () {
    Route::get('/', [SaleController::class, 'index'])->name('report.index');
    Route::get('/invoice/pdf/{id}', [SaleController::class, 'stream_pdf'])->name('invoice.pdf');
    Route::get('/detail/{id}', [SaleController::class, 'show'])->name('report.show');
});

Route::group(['prefix' => 'export'], function() {
    Route::get('/sales', [SaleController::class, 'export']);
});

Route::group(['prefix' => 'invoice'], function () {
    Route::get('/', [InvoiceController::class, 'index'])->name('invoice.index');
    Route::post('/store', [InvoiceController::class, 'store'])->name('invoice.store');
});

Route::group(['prefix' => 'customer'], function () {
    Route::post('/store', [CustomerController::class, 'store'])->name('customer.index');
});
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
