<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\Backend\AttributeController;
use App\Http\Controllers\Backend\AttributeOptionController;
use App\Http\Controllers\Backend\CollectionController;
use App\Http\Controllers\Backend\FirmController;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\InfoController;
use App\Http\Controllers\Backend\PhotoController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\TypeController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ManufactureController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\WishlistController;
use App\Models\Cart;
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

//Route::get('/', function () {
//    return view('frontend.pages.product.index');
//})->name('home');;

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');;
Route::get('/category', [\App\Http\Controllers\ProductController::class, 'list'])->name('home233');;
Route::get('/{slug}', [\App\Http\Controllers\ProductController::class, 'show'])->where('slug', 'p-[A-Za-z0-9-]+')->name('prod.show');


Route::get('/manufactures/', [ManufactureController::class, 'list'])->name('manufacture.list');
Route::get('/manufacture-{slug}', [ManufactureController::class, 'show'])->where('slug', '[A-Za-z0-9-]+')->name('manufacture.show');

Route::get('/wishlist/', [WishlistController::class, 'index'])->name('wishlist');
Route::get('/cart/', [CartController::class, 'index'])->name('cart');
Route::get('/order/', [OrderController::class, 'index'])->name('order');
Route::post('/order/', [OrderController::class, 'create'])->name('order.create');
Route::get('/sale/', [SaleController::class, 'index'])->name('sale');

Route::get('/info/{s}', [\App\Http\Controllers\InfoController::class, 'show'])->where('s', '[a-z-]+')->name('info');

Route::get('/contact/', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact/', [ContactController::class, 'send_mail'])->name('contact.send_mail');

Route::get('/backend/user', [UserController::class, 'index'])->name('backend.user');

Route::post('/ajax/wishlist', [AjaxController::class, 'wishlist'])->name('ajax.wishlist');
Route::post('/ajax/cart', [AjaxController::class, 'cart'])->name('ajax.cart');


Route::controller(LoginRegisterController::class)->group(function () {

    //   Route::get('/register', 'register')->name('register');
    // Route::post('/store', 'store')->name('store');
    Route::get('/backend', 'login')->name('backend.login');
    Route::get('/backend/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    //   Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/logout', 'logout')->name('logout');
});

Route::middleware(['role:admin'])->prefix('backend')->group(
    function () {
        Route::get('home', [HomeController::class, 'index'])->name('backend.home');

        Route::resource('product', ProductController::class)->names('backend.product');
        Route::get('product/copy/{id}', [ProductController::class, 'copy'])->name('backend.product.copy');
        Route::resource('firm', FirmController::class)->names('backend.firm');
        Route::resource('collection', CollectionController::class)->names('backend.collection');
        Route::resource('type', TypeController::class)->names('backend.type');
        Route::resource('attribute', AttributeController::class)->names('backend.attribute');
        Route::resource('attribute-option', AttributeOptionController::class)->names('backend.attribute-option');
        Route::resource('info', InfoController::class)->names('backend.info');
        Route::resource('slider', SliderController::class)->names('backend.slider');
        Route::resource('order', \App\Http\Controllers\Backend\OrderController::class)->names('backend.order');

        Route::post('/upload/photo', [PhotoController::class, 'upload'])->name('backend.photo.upload');
        Route::post('/upload/delete/{id}', [PhotoController::class, 'delete'])->name('backend.photo.delete');

    }
);
Route::any('/{slug_type}/{slug_firm?}/{slug_collection?}', [\App\Http\Controllers\TypeController::class, 'index'])->name('type.index');
//Route::post('ckeditor/upload', [CKEditorController::class, 'upload'])->name('ckeditor.image-upload');

