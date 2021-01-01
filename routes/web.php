<?php

use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductController;
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

Route::get('/', [Controller::class, 'index']);

Route::get('/products_by_subcategory/{subcategory_id}', [ProductController::class, 'getProductsBuSubcategory']);

Route::get('/admin/subcategories/{category_id}', [AdminProductController::class, 'findSubcategoriesByCategory'])->name('admin.subcategories');

Route::name('admin.')->prefix("admin")->group(function() {
    Route::resources([
        'products' => AdminProductController::class,
        'orders'   => AdminOrderController::class,
    ]);
});
