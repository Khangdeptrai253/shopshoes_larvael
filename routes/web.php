<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandProduct;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryProduct;
use App\Http\Controllers\ProdudctController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\DeliveryController;




use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//front end

Route::get('/', [HomeController::class,'index']);
Route::get('/homepage', [HomeController::class,'index'])->name('homepage');
Route::get('/category/{category_id}', [CategoryProduct::class,'show_category'])->name('category');
Route::get('/brand/{brand_id}', [BrandProduct::class,'show_brand'])->name('show_brand');
Route::get('/detail_product/{product_id}', [ProdudctController::class,'detail_product'])->name('detail_product');
Route::post('/search', [HomeController::class,'search_product'])->name('search');
Route::post('/check-coupon', [CartController::class,'check_coupon'])->name('check-coupon');


// cart
Route::post('/add-cart',[CartController::class,'add_cart_ajax']);
Route::get('/cart',[CartController::class,'cart']);
Route::get('/del-product{session_id}',[CartController::class,'del_product'])->name('del-product');
Route::get('/del-coupon',[CartController::class,'del_coupon'])->name('del-coupon');
Route::post('/update-cart',[CartController::class,'update_cart'])->name('update-cart');
Route::get('/del-all',[CartController::class,'delete_all_cart'])->name('delete-all-cart');
// checkout
Route::get('/register', [CheckOutController::class,'register'])->name('register');
Route::get('/login-checkout', [CheckOutController::class,'login_checkout'])->name('login-checkout');
Route::post('/add-customer', [CheckOutController::class,'add_customer'])->name('add-customer');
Route::get('/check-out', [CheckOutController::class,'check_out'])->name('check-out');
Route::post('/save-checkout-customer', [CheckOutController::class,'save_checkout_customer'])->name('save-checkout-customer');
Route::get('/payment', [CheckOutController::class,'payment'])->name('payment');
Route::get('/logout-checkout', [CheckOutController::class,'logout_checkout'])->name('logout-checkout');
Route::post('/login-customer', [CheckOutController::class,'login_customer'])->name('login-customer');
Route::post('/place-order', [CheckOutController::class,'place_order'])->name('place-order');
Route::post('/select-delivery', [CheckOutController::class,'select_delivery']);
Route::post('/caculate-fee', [CheckOutController::class,'caculate_fee']);
Route::get('/delete-feeship', [CheckOutController::class,'delete_feeship'])->name('delete-feeship');


//backend
//admin
Route::get('/admin', [AdminController::class,'index']);
Route::get('/dashboard', [AdminController::class,'show_dashboard']);
Route::post('/admin-dashboard', [AdminController::class,'dashboard'])->name('admin-dashboard');
Route::get('/logout', [AdminController::class,'logout'])->name('logout');
// category product
Route::get('/add-cat-product', [CategoryProduct::class,'add_cate_product'])->name('add-cat-product');
Route::get('/all-category', [CategoryProduct::class,'all_category'])->name('all-category');
Route::get('/active-category/{category_product_id}', [CategoryProduct::class,'active_category_product'])->name('active-category');
Route::get('/unactive-category/{category_product_id}', [CategoryProduct::class,'unactive_category_product'])->name('unactive-category');
Route::post('/save-cate', [CategoryProduct::class,'save_category'])->name('save-cate');
Route::get('/edit-category/{category_product_id}', [CategoryProduct::class,'edit_category_product'])->name('edit-category');
Route::post('/update-cat-product/{category_product_id}', [CategoryProduct::class,'update_cate_product'])->name('update-cat');
Route::get('/delete-category_product/{category_product_id}', [CategoryProduct::class,'delete_category'])->name('delete-category_product');
//brand product
Route::get('/add-brand-product', [BrandProduct::class,'add_brand_product'])->name('add-brand-product');
Route::get('/all-brand', [BrandProduct::class,'all_brand'])->name('all-brand');
Route::get('/active-brand/{brand_product_id}', [BrandProduct::class,'active_brand_product'])->name('active-brand');
Route::get('/unactive-brand/{brand_product_id}', [BrandProduct::class,'unactive_brand_product'])->name('unactive-brand');
Route::post('/save-brand', [BrandProduct::class,'save_brand'])->name('save-brand');
Route::get('/edit-brand/{brand_product_id}', [BrandProduct::class,'edit_brand_product'])->name('edit-brand');
Route::post('/update-brand-product/{brand_product_id}', [BrandProduct::class,'update_brand_product'])->name('update-brand');
Route::get('/delete-brand_product/{brand_product_id}', [BrandProduct::class,'delete_brand'])->name('delete-brand');
// product
Route::get('/add-product', [ProdudctController::class,'add_product'])->name('add-product');
Route::get('/all-product', [ProdudctController::class,'all_product'])->name('all-product');
Route::get('/active-product/{product_id}', [ProdudctController::class,'active_product'])->name('active-product');
Route::get('/unactive-product/{product_id}', [ProdudctController::class,'unactive_product'])->name('unactive-product');
Route::post('/save-product', [ProdudctController::class,'save_product'])->name('save-product');
Route::get('/edit-product/{product_id}', [ProdudctController::class,'edit_product'])->name('edit-product');
Route::post('/update-product/{product_id}', [ProdudctController::class,'update_product'])->name('update-product');
Route::get('/delete-product/{product_id}', [ProdudctController::class,'delete_product'])->name('delete-product');
//coupon
Route::get('/add-coupon', [CouponController::class,'add_coupon'])->name('add-coupon');
Route::post('/save-coupon', [CouponController::class,'save_coupon'])->name('save-coupon');
Route::get('/all-coupon', [CouponController::class,'all_coupon'])->name('all-coupon');
Route::get('/delete-coupon/{coupon_id}', [CouponController::class,'delete_coupon'])->name('delete-coupon');
// delivery
Route::get('/add-delivery', [DeliveryController::class,'add_delivery'])->name('add-delivery');
Route::post('/select-delivery', [DeliveryController::class,'select_delivery']);
Route::post('/insert-delivery', [DeliveryController::class,'insert_delivery']);
Route::post('/select-feeship', [DeliveryController::class,'select_feeship']);
Route::post('/update-feeship', [DeliveryController::class,'update_feeship']);


















