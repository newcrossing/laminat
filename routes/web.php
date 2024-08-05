<?php

use App\Http\Controllers\Backend\FirmController;
use App\Models\Firm;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\UserController;
use Spatie\Permission\Models\Role;
use \App\Http\Controllers\Auth\LoginRegisterController;

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

Route::get('/', function () {
    return view('frontend.pages.product.index');
})->name('home');;

Route::get('/category', [\App\Http\Controllers\ProductController::class, 'list'])->name('home233');;
Route::get('/{slug}', [\App\Http\Controllers\ProductController::class, 'show'])->where('slug', 'p-[A-Za-z0-9-]+')->name('prod.show');

Route::get('/backend/user', [UserController::class, 'index'])->name('backend.user');

Route::get('/add', function () {
//    User::create([
//        'login' =>'admin',
//        'password' => Hash::make('111111')
//    ]);

    // $role = Role::create(['name' => 'user']);
    // $role = Role::create(['name' => 'admin']);
    //$user = User::find(1);
    // $user->assignRole('user');
    //$user->assignRole('admin');
    $prod = \App\Models\Product::first();
    foreach ($prod->attributeOptions as $attributeOption) {
        print $attributeOption->attribute->name;
    }
    //dd($prod->attributeOptions);
    //  $Attr = \App\Models\Attribute::first()->attributeOptions;;
    // dd($Attr);
    //$prod->attributeOptions()->sync([1,2,3,4]);
});
Route::controller(LoginRegisterController::class)->group(function () {

    //   Route::get('/register', 'register')->name('register');
    // Route::post('/store', 'store')->name('store');
    Route::get('/backend', 'login')->name('login');
    Route::get('/backend/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    //   Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/logout', 'logout')->name('logout');
});

Route::middleware(['role:admin'])->prefix('backend')->group(
    function () {
        Route::get('/home', [HomeController::class, 'index'])->name('backend.home');
        Route::resource('product', ProductController::class)->names('backend.product');
        Route::resource('firm', FirmController::class)->names('backend.firm');
        Route::post('/upload/photo', [\App\Http\Controllers\Backend\PhotoController::class, 'upload'])->name('backend.photo.upload');
        Route::post('/upload/delete/{id}', [\App\Http\Controllers\Backend\PhotoController::class, 'delete'])->name('backend.photo.delete');
//        Route::get('/product/edit', [ProductController::class, 'edit'])->name('backend.product.edit');
//        Route::get('/product/create', [ProductController::class, 'create'])->name('backend.product.edit');
//        Route::post('/product/update', [ProductController::class, 'update'])->name('backend.product.update');
    }
);

//Route::post('ckeditor/upload', [CKEditorController::class, 'upload'])->name('ckeditor.image-upload');

