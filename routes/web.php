<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\LoginController;
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
Route::get('/admin/login', [LoginController::class, 'index'])->name('login.admin');

Route::post('/admin/login', [LoginController::class, 'checkLogin'])->name('post.login.admin');

Route::get('/admin', function () { 
    return view('layout_index');
})->name('admin.home')->middleware('checklogin');
Route::prefix('category')->group(function () {
    // thêm danh mục create
    Route::get('/create', [CategoryController::class, 'create'])->name('cate.create');
    // lưu danh mục 
    Route::post('/store', [CategoryController::class, 'store'])->name('cate.store');
    // hiện thị trang chủ
    Route::get('/', [CategoryController::class, 'index'])->name('cate.index');
    // danh sách tất cả các dữ liệu trong bảng
    Route::get('/anyData', [CategoryController::class, 'anyData'])->name('anyData');
    // hiện thị table form sửa thông tin
    Route::get('/show/{id}', [CategoryController::class, 'show'])->name('cate.show');
    // upadte thông tin được thêm
    Route::post('/edit/{id}', [CategoryController::class, 'update'])->name('cate.update');
    // Xóa thông tin
    Route::get('/destroy/{id}', [CategoryController::class, 'destroy'])->name('cate.destroy');
});

Route::prefix('products')->group(function () {
    // hiện thị danh sasch
    Route::get('/', [ProductsController::class, 'index'])->name('pro.index');
    Route::get('/sfd', [ProductsController::class, 'edit'])->name('pro.edit');
    // thêm danh mục create
    Route::get('/create', [ProductsController::class, 'create'])->name('pro.create');
    // lưu danh mục 
    Route::post('/store', [ProductsController::class, 'store'])->name('pro.store');
    // hiện thị table form sửa thông tin
    Route::get('/show/{id}', [ProductsController::class, 'show'])->name('pro.show');
    // upadte thông tin được thêm
    Route::post('/edit/{id}', [ProductsController::class, 'update'])->name('pro.update');
    // Xóa thông tin
    Route::get('/destroy/{id}', [ProductsController::class, 'destroy'])->name('pro.destroy');
});

Route::prefix('account')->group(function () {
    // hiện thị danh sasch
    Route::get('/', [AccountController::class, 'index'])->name('acc.index');
    // thêm danh mục create
    Route::get('/create', [AccountController::class, 'create'])->name('acc.create');
    // lưu danh mục 
    Route::post('/store', [AccountController::class, 'store'])->name('acc.store');
    // hiện thị table form sửa thông tin
    Route::get('/show/{id}', [AccountController::class, 'show'])->name('acc.show');
    // upadte thông tin được thêm
    Route::post('/edit/{id}', [AccountController::class, 'update'])->name('acc.update');
    // Xóa thông tin
    Route::get('/destroy/{id}', [AccountController::class, 'destroy'])->name('acc.destroy');
});

// liên quan đến phần người dùng gồm đăng nhập, đăng kya , quyên mật khẩu.
Route::get('login', function(){
    return view('logins.index');
});
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
