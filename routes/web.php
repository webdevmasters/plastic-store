<?php

use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WishlistController;
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

Route::get('/', [HomeController::class, 'index']);

Route::get('/slider_products_by_subcategory/{subcategory_id}', [ProductController::class, 'renderSliderBySubcategory']);
Route::get('/products_by_category/{category:slug}', [ProductController::class, 'showProductsByCategory'])->name('products.by.category');
Route::get('/products_by_subcategory/{subcategory:slug}', [ProductController::class, 'showProductsBySubcategory'])->name('products.by.subcategory');
Route::get('/products_list_fragment/{data}', [ProductController::class, 'renderProductList']);
Route::get('/products_list_searched_fragment/{data}', [ProductController::class, 'renderSearchedProductList']);
Route::get('/product_modal/{id}', [ProductController::class, 'showProductModal']);
Route::get('/search_products_by_name', [ProductController::class, 'searchProduct'])->name('search_by_name');
Route::get('/single_product/{product:slug}', [ProductController::class, 'showSingleProduct'])->name('single.product.by.id');
Route::post('/single_product/add_review', [ProductController::class, 'addReview'])->name('add.review');

Route::post('/cart/add_to_cart', [CartController::class, 'store'])->name('add.to.cart');
Route::get('/cart/delete_mini_cart_item/{id}', [CartController::class, 'destroyFromMiniCart'])->name('delete.mini_cart.item');
Route::get('/cart/delete_cart_item/{id}', [CartController::class, 'destroyFromCart'])->name('delete.cart.item');
Route::get('/cart/show_cart', [CartController::class, 'index'])->name('show.cart');
Route::get('/cart/update_mini_cart/{id}/{quantity}', [CartController::class, 'updateMiniCart'])->name('update.mini.cart');

Route::get('/wishlist/show_wishlist', [WishlistController::class, 'index'])->name('show.wishlist');
Route::post('/wishlist/add_to_wishlist', [WishlistController::class, 'store'])->name('add.to.wishlist');
Route::get('/wishlist/delete_wishlist_item/{id}', [WishlistController::class, 'destroyFromWishlist'])->name('delete.wishlist.item');


Route::get('/admin/subcategories/{category_id}', [AdminProductController::class, 'findSubcategoriesByCategory'])->name('admin.subcategories');

Route::name('admin.')->prefix("admin")->middleware('can:manage-customers')->group(function() {
    Route::resources([
        'products' => AdminProductController::class,
    ]);
});

require __DIR__ . '/auth.php';
