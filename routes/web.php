<?php

use App\Http\Controllers\AnalysisController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\ComputersCotroller;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductCatagoryController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\PurchasesController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\SellsController;
use App\Http\Controllers\WithdrawalsController;
use App\Models\ProductCatagory;
use App\Models\Products;
use App\Models\sales;
use App\Models\Withdrawals;
use GuzzleHttp\Psr7\Uri;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

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

Route::get("/", function () {
    return redirect(route('pages.home'));
});


Route::prefix('pages')->name('pages.')->group(function () {
    Route::view('/home', 'pages.home')->name('home');
    Route::view('/about', 'pages.about')->name('about');
    Route::view('/contact', 'pages.contact')->name('contact');
    Route::view('/services', 'pages.services')->name('services');
    Route::get('/login', [loginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [loginController::class, 'login']);
});

Route::get('/t', [loginController::class, 'register']);

Route::get('/services/{category}', [ProductCatagoryController::class, 'showServices'])->name('servicesList');

Route::get('/products/{product}', [ProductsController::class, 'show'])->name('product.detail');








Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/dashbord', [DashboardController::class, 'index'])->name('dashboard');

    Route::view('/analays', 'admin.analays')->name('analays');

    Route::get('/add', [ProductCatagoryController::class, 'index'])->name('add');
    Route::get('/catagory', [ProductCatagoryController::class, 'delete'])->name('catagory.delete');
    Route::get('/logout', [loginController::class, 'logout'])->name('logout');

    // crud
    Route::delete('/products/{id}', [ProductsController::class, 'destroy'])->name('products.destroy');
    Route::post('/products/sell/store', [SalesController::class, 'store'])->name('sell.store');
    Route::post('/products/buy/store', [PurchasesController::class, 'store'])->name('purchase.store');
    Route::put('/products/{id}/update', [ProductsController::class, 'update'])->name('product.update');
    // catagory save or update
    Route::post('/crud/add-catagory/store-Or-Update', [ProductCatagoryController::class, 'storeOrUpdate'])->name('add_catagory.store');
    //proudct save
    Route::post('/crud/product/store', [ProductsController::class, 'store'])->name('product.store');

    Route::get('/purchases/delete/{id}', [PurchasesController::class, 'destroy'])
        ->name('purchases.delete');

    Route::get('/purchases/delete/{id}', [PurchasesController::class, 'destroy'])
        ->name('purchases.delete');

    Route::put('purchases/{id}', [PurchasesController::class, 'update'])->name('purchases.update');


    Route::get('/sales/delete/{id}', [SalesController::class, 'destroy'])->name('sales.delete');
    Route::put('/sales/{id}', [SalesController::class, 'update'])->name('sales.update');


    Route::get('/withdrawal/store', [WithdrawalsController::class, 'store'])->name('withdrawal.store');
    Route::get('/withdrawal/delete/{id}', [WithdrawalsController::class, 'destroy'])->name('withdrawal.delete');

    Route::put('/withdrawals/{id}', [WithdrawalsController::class, 'update'])->name('withdrawals.update');

    Route::get('/analysis', [AnalysisController::class, 'index'])->name('analysis');
    Route::post('/analysis/filter', [AnalysisController::class, 'filter'])->name('analysis.filter');
    Route::post('/finance/filter', [AnalysisController::class, 'filterFinance'])->name('finance.filter');
});



// routes/web.php
Route::get('/category/{id}', [ProductCatagoryController::class, 'show'])->name('category.show');

//mail
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');
