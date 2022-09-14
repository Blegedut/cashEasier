<?php

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
Route::get('/product', function () {
    return view('stockbarang.index');
});
Route::get('/cashire', function () {
    return view('cashire.index');
});
Route::get('/checkout', function () {
    return view('checkout.index');
});
Route::get('/report', function () {
    return view('report.index');
});
Route::get('/report/show', function () {
    return view('report.show');
});