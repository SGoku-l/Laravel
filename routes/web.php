<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/',[HomeController::class,'home']);

Route::get('dashboard',[HomeController::class,'login_index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('admin/dashboard',[HomeController::class,'index'])->middleware(['auth','admin']);

Route::get('view_catagory',[AdminController::class,'view_catagory'])->middleware(['auth','admin']);

Route::post('add_catagory',[AdminController::class,'add_catagory'])->middleware(['auth','admin']);

Route::get('edit_catagory/{id}',[AdminController::class,'edit_catagory'])->middleware(['auth','admin']);

Route::get('delete_catagory/{id}',[AdminController::class,'delete_catagory'])->middleware(['auth','admin']);

Route::post('updata_catagory/{id}',[AdminController::class,'updata_catagory'])->middleware(['auth','admin']);

Route::get('add_products',[AdminController::class,'add_products'])->middleware(['auth','admin']);

Route::post('upload_products',[AdminController::class,'upload_products'])->middleware(['auth','admin']);

Route::get('view_products',[AdminController::class,'view_products'])->middleware(['auth','admin']);

Route::get('delete_products/{slug}',[AdminController::class,'delete_products'])->middleware(['auth','admin']);

Route::get('edit_productsget/{id}',[AdminController::class,'edit_productsget'])->middleware(['auth','admin']);

Route::post('update_products/{id}',[AdminController::class,'update_products'])->middleware(['auth','admin']);

Route::get('product_search',[AdminController::class,'product_search'])->middleware(['auth','admin']);

Route::get('product_details/{id}',[HomeController::class,'product_details']);

Route::get('add_cart/{id}',[HomeController::class,'add_cart'])->middleware(['auth','verified']);

Route::get('mycart',[HomeController::class,'mycart'])->middleware(['auth','verified']);

Route::get('delete_cart_product/{id}',[HomeController::class,'delete_cart_product'])->middleware(['auth','verified']);

Route::post('conform_order',[HomeController::class,'conform_order'])->middleware(['auth','verified']);

Route::get('view_orders',[AdminController::class,'view_orders'])->middleware(['auth','admin']);

Route::get('on_the_way/{id}',[AdminController::class,'on_the_way'])->middleware(['auth','admin']);

Route::get('order_deliverd/{id}',[AdminController::class,'order_deliverd'])->middleware(['auth','admin']);

Route::get('print_pdf/{id}',[AdminController::class,'print_pdf'])->middleware(['auth','admin']);

Route::get('razorpay-payment/{value}', [HomeController::class, 'indexx'])->middleware(['auth','verified']);

Route::get('users_list', [AdminController::class, 'users_list'])->middleware(['auth','admin']);

Route::get('users_search', [AdminController::class, 'users_search'])->middleware(['auth','admin']);

Route::get('myorder', [HomeController::class, 'my_order'])->middleware(['auth','verified']);

Route::post('razorpay-payment/{value}', [HomeController::class, 'store'])->name('razorpay.payment.store');

Route::get('shop',[HomeController::class,'shop']);

Route::get('catagory_list_find/{catagory_name}',[HomeController::class,'catagory_list_find']);

Route::get('search_product',[HomeController::class,'search_product']);

Route::get('why',[HomeController::class,'why']);

Route::get('testimonial',[HomeController::class,'testimonial']);

Route::get('contact',[HomeController::class,'contact']);

Route::post('contact',[HomeController::class,'contact_details']);