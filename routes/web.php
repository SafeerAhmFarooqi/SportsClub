<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\MessageBag;
use App\Http\Controllers\AdminClientController;
use App\Models\User;
use App\Models\cart;
use App\Models\items;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Http\Request;
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

Route::get('/',[AdminClientController::class,'home']);
Route::get('/signout',[AdminClientController::class,'signout']);
Route::get('/userapp', [AdminClientController::class,'userapp']);
Route::post('/lsubmit',[AdminClientController::class,'login']);
Route::post('/add_to_cart/{id}',[AdminClientController::class,'add_to_cart']);
Route::post('/buynow/{id}',[AdminClientController::class,'buy_now']);
Route::get('/buynow/{id}',[AdminClientController::class,'buy_now_get']);
Route::post('/delete_cart_item/{cart_id}',[AdminClientController::class,'delete_cart_item']);
Route::get('/useritems',[AdminClientController::class,'items']);
Route::get('/buyitem/{id}',[AdminClientController::class,'buyitempage']);
Route::get('/cartpage',[AdminClientController::class,'cart_item_page']);
Route::get('/checkout',[AdminClientController::class,'checkout']);
Route::post('/orderplace',[AdminClientController::class,'place_order']);
Route::get('/signup',[AdminClientController::class,'create']);
Route::post('/userreg',[AdminClientController::class,'store']);
Route::get('/search',[AdminClientController::class,'search_items']);
Route::get('/showprofile',[AdminClientController::class,'show_profile']);
Route::get('/editprofile',[AdminClientController::class,'edit_profile']);
Route::post('/savechanges',[AdminClientController::class,'save_changes']);
Route::get('/changepassword',[AdminClientController::class,'change_password']);
Route::post('/change_password_post',[AdminClientController::class,'change_password_post']);
Route::get('/change_password_post',[AdminClientController::class,'change_password']);
Route::post('/forgotpassword',[AdminClientController::class,'forgot_password_post']);
Route::get('/forgotpassword',[AdminClientController::class,'forgot_password']);
Route::get('/admin',[AdminClientController::class,'admin_get']);
Route::post('/admin_orders',[AdminClientController::class,'admin_orders']);
Route::get('/admin_orders',[AdminClientController::class,'admin_orders_get']);
Route::post('/delete_order/{order_id}',[AdminClientController::class,'delete_order']);
Route::get('/delete_order/{order_id}',[AdminClientController::class,'delete_order_get']);
Route::post('/delete_all',[AdminClientController::class,'delete_all']);
Route::get('/delete_all',[AdminClientController::class,'delete_all_get']);
Route::post('/admin_products',[AdminClientController::class,'admin_products']);
Route::get('/admin_products',[AdminClientController::class,'admin_products_get']);
Route::post('/delete_product/{order_id}',[AdminClientController::class,'delete_product']);
Route::get('/delete_product/{order_id}',[AdminClientController::class,'delete_product_get']);
Route::post('/admin_users',[AdminClientController::class,'admin_users']);
Route::get('/admin_users',[AdminClientController::class,'admin_users_get']);
Route::post('/delete_all_product',[AdminClientController::class,'delete_all_product']);
Route::get('/delete_all_product',[AdminClientController::class,'delete_all_product_get']);
Route::post('/delete_user/{order_id}',[AdminClientController::class,'delete_user']);
Route::get('/delete_user/{order_id}',[AdminClientController::class,'delete_user_get']);
Route::post('/delete_all_user',[AdminClientController::class,'delete_all_user']);
Route::get('/delete_all_user',[AdminClientController::class,'delete_all_user_get']);
Route::get('/admin_signout',[AdminClientController::class,'admin_signout']);
Route::post('/admin_insert_products',[AdminClientController::class,'admin_insert_products']);
Route::get('/admin_insert_products',[AdminClientController::class,'admin_insert_products_get']);
Route::post('/admin_product_upload',[AdminClientController::class,'admin_product_upload']);