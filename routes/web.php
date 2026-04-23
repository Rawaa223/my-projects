<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\contactController;
use Illuminate\Support\Facades\Route;

Route::get('/',[UserController::class,'index']);
Route::post('/book/table', [UserController::class, 'bookTable'])->name('book.table');

Route::middleware([
    'auth:sanctum',
     config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [UserController::class,'home'])->middleware('auth')->name('dashboard');
    Route::post('/addtocart', [UserController::class, 'addToCart'])->name('addtocart');
    Route::get('/foodcart', [UserController::class, 'foodCart'])->name('food.cart');
    Route::delete('/remove/{id}', [UserController::class, 'removeCart'])->name('delete.cart');
    Route::post('/confirm_order', [UserController::class, 'confirmOrderCart'])->name('cart.confirm');
    Route::get('/orders/status',[UserController::class,'viewOrders'])->middleware('auth')->name('Order.Status');
    Route::get('/bookings', [UserController::class, 'viewBookings'])->name('bookings.index');
    Route::get('/bookings/{id}/edit', [UserController::class, 'editBooking'])->name('bookings.edit');
    Route::patch('/bookings/{id}', [UserController::class, 'updateBooking'])->name('bookings.update');
    Route::delete('/bookings/{id}', [UserController::class, 'deleteBooking'])->name('bookings.delete');
    Route::get('/contact', [ContactController::class, 'send'])->name('contact.page');
    Route::post('/contact', [ContactController::class, 'contactPost'])->name('contact.send');


    });
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/addfood',[AdminController::class,'addFood'])->middleware('auth','admin')->name('admin.addfood');
Route::post('/addfood',[AdminController::class,'postAddFood'])->middleware('auth','admin')->name('admin.postaddfood');
Route::get('/showfood',[AdminController::class,'showFood'])->middleware('auth','admin')->name('admin.showfood');
Route::get('/deletefood/{id}',[AdminController::class,'deleteFood'])->middleware('auth','admin')->name('admin.deletefood');
Route::get('/updatefood/{id}',[AdminController::class,'updateFood'])->middleware('auth','admin')->name('admin.updatefood');
Route::post('/updatefood/{id}',[AdminController::class,'postUpdateFood'])->middleware('auth','admin')->name('admin.postupdatefood');
Route::get('/vieworders',[AdminController::class,'viewOrders'])->middleware('auth','admin')->name('admin.vieworders');
Route::get('/delivered/{id}',[AdminController::class,'foodStatusDelivered'])->middleware('auth','admin')->name('admin.delivered');
Route::get('/cancel/{id}',[AdminController::class,'foodStatusCancelled'])->middleware('auth','admin')->name('admin.cancel');
Route::get('/viewbookedtable',[AdminController::class,'viewBookedTable'])->middleware('auth','admin')->name('admin.viewbookedtable');
