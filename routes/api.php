<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockInController;
use App\Http\Controllers\StockAdjustmentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware('auth:sanctum')->group(function () {

    // Group for user management routes
    Route::post('/registerUser', [UserController::class, 'store'])->name('users.store');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    // Logout route
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Group for category management routes
    Route::post('/addCategory', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/{id}', [CategoryController::class, 'show'])->name('categories.show');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    // Group for brand management routes
    Route::post('/addBrand', [BrandController::class, 'store'])->name('brands.store');
    Route::get('/brands', [BrandController::class, 'index'])->name('brands.index');
    Route::get('/brands/{id}', [BrandController::class, 'show'])->name('brands.show');
    Route::put('/brands/{brand}', [BrandController::class, 'update'])->name('brands.update');
    Route::delete('/brands/{id}', [BrandController::class, 'destroy'])->name('brands.destroy');

    // Group for product management routes
    Route::post('/addProduct', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

    // Group for stock in routes
    Route::post('/doStockIn', [StockInController::class, 'store'])->name('stockIns.store');
    Route::get('/stockIns', [StockInController::class, 'index'])->name('stockIns.index');
    Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::get('/critical-stock', [ProductController::class, 'getCriticalStock'])->name('products.critical_stock');

    // Group for stock adjustment routes
    Route::post('/doStockAdjustment', [StockAdjustmentController::class, 'store'])->name('stockAdjustments.store');
    Route::get('/stockAdjustment', [StockAdjustmentController::class, 'index'])->name('stockAdjustments.index');
});
