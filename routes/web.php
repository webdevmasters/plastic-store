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

Route::get('/slider_products_by_subcategory/{subcategory_id}', [ProductController::class, 'renderSliderBySubcategory']);
Route::get('/products_by_category/{category_id}', [ProductController::class, 'showProductsByCategory'])->name('products.by.category');
Route::get('/products_by_subcategory/{subcategory_id}', [ProductController::class, 'showProductsBySubcategory'])->name('products.by.subcategory');
Route::get('/products_list_fragment/{data}', [ProductController::class, 'renderProductList']);
Route::get('/products_list_searched_fragment/{data}', [ProductController::class, 'renderSearchedProductList']);
Route::get('/search_products_by_name', [ProductController::class, 'searchProduct'])->name('search_by_name');

Route::get('/admin/subcategories/{category_id}', [AdminProductController::class, 'findSubcategoriesByCategory'])->name('admin.subcategories');

Route::name('admin.')->prefix("admin")->group(function() {
    Route::resources([
        'products' => AdminProductController::class,
        'orders'   => AdminOrderController::class,
    ]);
});
