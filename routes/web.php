<?php

use App\Http\Controllers\Admin\AdminMessageController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminPromotionController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\OrderController;
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
Route::get('/about', [HomeController::class, 'about'])->name('show.about');
Route::get('/shipping_info', [HomeController::class, 'shippingInfo'])->name('show.shipping.info');
Route::get('/selling_terms', [HomeController::class, 'sellingTerms'])->name('show.selling.terms');
Route::get('/faqs', [HomeController::class, 'faqs'])->name('show.faqs');
Route::get('/change_language/{language}', [HomeController::class, 'changeLanguage'])->name('change.language');

Route::get('/contact', [MessageController::class, 'contact'])->name('show.contact');
Route::post('/send_message', [MessageController::class, 'sendMessage'])->name('send.message');

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

Route::post('/order/place_order', [OrderController::class, 'store'])->name('place.order');
Route::get('/order/create_order', [OrderController::class, 'create'])->name('create.checkout');
Route::get('/order/order_confirmation/{id}', [OrderController::class, 'confirmOrder'])->name('order.confirmation');
Route::get('/order/order_details/{id}', [OrderController::class, 'show'])->name('order.details');
Route::get('/order/cancel_order/{id}', [OrderController::class, 'cancel'])->name('order.cancel');

Route::get('/admin/subcategories/{category_id}', [AdminProductController::class, 'findSubcategoriesByCategory'])->name('admin.subcategories');

Route::name('admin.')->prefix("admin")->middleware('can:manage-customers')->group(function() {
    Route::resources([
        'products'   => AdminProductController::class,
        'orders'     => AdminOrderController::class,
        'promotions' => AdminPromotionController::class,
    ]);
});

Route::middleware('can:manage-customers')->group(function() {
    Route::get('/admin/products/products_by_category/{id}', [AdminProductController::class, 'loadProductsByCategory'])->name('admin.products.category');

    Route::get('/admin/orders/customer_details/{id}', [AdminOrderController::class, 'showCustomerOrderDetails'])->name('admin.orders.customer.details');
    Route::get('/admin/orders/confirm_order/{id}', [AdminOrderController::class, 'confirmOrder'])->name('admin.orders.confirm');
    Route::get('/admin/orders/delete_order/{id}', [AdminOrderController::class, 'destroy'])->name('admin.orders.delete');

    Route::get('/admin/users', [AdminUserController::class, 'index'])->name('admin.users.index');
    Route::get('/admin/users/delete_user/{id}', [AdminUserController::class, 'destroy'])->name('admin.users.delete');
    Route::get('/admin/users/user_details/{id}', [AdminUserController::class, 'show'])->name('admin.users.details');

    Route::get('/admin/messages', [AdminMessageController::class, 'index'])->name('admin.messages.index');
    Route::get('/admin/messages/delete_message/{id}', [AdminMessageController::class, 'destroy'])->name('admin.messages.delete');
    Route::get('/admin/messages/answer_message/{id}/{result}', [AdminMessageController::class, 'answer'])->name('admin.messages.answer');
});
require __DIR__ . '/auth.php';
