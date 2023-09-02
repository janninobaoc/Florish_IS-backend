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
    Route::prefix('/users')->group(function () {
        Route::post('/', [UserController::class, 'store'])->name('users.store');
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::put('/{user}', [UserController::class, 'update'])->name('users.update');
        Route::get('{id}', [UserController::class, 'show'])->name('users.show');
        Route::delete('{id}', [UserController::class, 'destroy'])->name('users.destroy');
    });

    // Group for category management routes
    Route::prefix('/categories')->group(function () {
        Route::post('/', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('/{id}', [CategoryController::class, 'show'])->name('categories.show');
        Route::put('/{category}', [CategoryController::class, 'update'])->name('categories.update');
        Route::delete('{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    });

    // Group for brand management routes
    Route::prefix('/brands')->group(function () {
        Route::post('/', [BrandController::class, 'store'])->name('brands.store');
        Route::get('/', [BrandController::class, 'index'])->name('brands.index');
        Route::get('/{id}', [BrandController::class, 'show'])->name('brands.show');
        Route::put('/{brand}', [BrandController::class, 'update'])->name('brands.update');
        Route::delete('{id}', [BrandController::class, 'destroy'])->name('brands.destroy');
    });

    Route::prefix('/products')->group(function () {
        Route::post('/', [ProductController::class, 'store'])->name('products.store');
        //Route for critical-stock
        Route::get('/critical-stock', [ProductController::class, 'getCriticalStock'])->name('products.critical_stock');
        Route::get('/', [ProductController::class, 'index'])->name('products.index');
        Route::get('{id}', [ProductController::class, 'show'])->name('products.show');
        Route::put('{product}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('{id}', [ProductController::class, 'destroy'])->name('products.destroy');
    });

    // Group for stock in routes
    Route::prefix('/stockIns')->group(function () {
        Route::post('/', [StockInController::class, 'store'])->name('stockIns.store');
        Route::get('/', [StockInController::class, 'index'])->name('stockIns.index');
    });

    // Group for stock adjustment routes
    Route::prefix('/stockIns')->group(function () {
        Route::post('/doStockAdjustment', [StockAdjustmentController::class, 'store'])->name('stockAdjustments.store');
        Route::get('/stockAdjustment', [StockAdjustmentController::class, 'index'])->name('stockAdjustments.index');
    });

    // Logout route
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
