<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackEnd\Admin\UserController;
use App\Http\Controllers\BackEnd\Admin\AdminController;
use App\Http\Controllers\BackEnd\Admin\BlogController;
use App\Http\Controllers\BackEnd\Admin\CategoryController;
use App\Http\Controllers\Frontend\FrontendController;

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

// ==================================================================================================================
// =========================================== Frontend Routes ===================================================
// ==================================================================================================================
Route::get('/', [FrontendController::class, 'welcome'])->name('welcome');
Route::get('/blogsList/{cat_id}', [FrontendController::class, 'blogsList'])->name('blogsList');
Route::get('/singleBlog/{blog_id}', [FrontendController::class, 'singleBlog'])->name('singleBlog');


// ==================================================================================================================
// =========================================== Super Admin Routes ===================================================
// ==================================================================================================================
Route::prefix('super_admin')->name('super_admin.')->group(function () {
    Route::get('/login', [AdminController::class, 'showLoginForm'])->name('login');
    Route::post('/loginSubmit', [AdminController::class, 'login'])->name('login.submit');
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
    Route::group(['middleware' => 'auth'], function () {

        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

        // ==================================================================================================================
        // =========================================== User Routes ===================================================
        // ==================================================================================================================


        Route::group(['prefix' => 'users', 'middleware' => 'admin'], function () {
            Route::get('/create', [UserController::class, 'create'])->name('users-create');
            Route::post('/store', [UserController::class, 'store'])->name('users-store');
            Route::get('/index', [UserController::class, 'index'])->name('users-index');
            Route::get('show/{id}', [UserController::class, 'show'])->name('users-show');
            Route::get('edit/{id}', [UserController::class, 'edit'])->name('users-edit');
            Route::post('update/{id}', [UserController::class, 'update'])->name('users-update');
            Route::get('softDelete/{id}', [UserController::class, 'softDelete'])->name('users-softDelete');
            Route::get('/showSoftDelete', [UserController::class, 'showSoftDelete'])->name('users-showSoftDelete');
            Route::get('softDeleteRestore/{id}', [UserController::class, 'softDeleteRestore'])->name('users-softDeleteRestore');
            Route::get('/activeInactiveSingle/{id}', [UserController::class, 'activeInactiveSingle'])->name('users-activeInactiveSingle');
        });
        // ==================================================================================================================
        // =========================================== Categories Routes ===================================================
        // ==================================================================================================================

        Route::group(['prefix' => 'categories'], function () {
            Route::get('/create', [CategoryController::class, 'create'])->name('categories-create');
            Route::post('/store', [CategoryController::class, 'store'])->name('categories-store');
            Route::get('/index', [CategoryController::class, 'index'])->name('categories-index');
            Route::get('show/{id}', [CategoryController::class, 'show'])->name('categories-show');
            Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('categories-edit');
            Route::post('update/{id}', [CategoryController::class, 'update'])->name('categories-update');
            Route::get('softDelete/{id}', [CategoryController::class, 'softDelete'])->name('categories-softDelete');
            Route::get('/showSoftDelete', [CategoryController::class, 'showSoftDelete'])->name('categories-showSoftDelete');
            Route::get('softDeleteRestore/{id}', [CategoryController::class, 'softDeleteRestore'])->name('categories-softDeleteRestore');
            Route::get('/activeInactiveSingle/{id}', [CategoryController::class, 'activeInactiveSingle'])->name('categories-activeInactiveSingle');
        });
        // ==================================================================================================================
        // =========================================== Blogs Routes ===================================================
        // ==================================================================================================================

        Route::group(['prefix' => 'blogs'], function () {
            Route::get('/create', [BlogController::class, 'create'])->name('blogs-create');
            Route::post('/store', [BlogController::class, 'store'])->name('blogs-store');
            Route::get('/index', [BlogController::class, 'index'])->name('blogs-index');
            Route::get('show/{id}', [BlogController::class, 'show'])->name('blogs-show');
            Route::get('edit/{id}', [BlogController::class, 'edit'])->name('blogs-edit');
            Route::post('update/{id}', [BlogController::class, 'update'])->name('blogs-update');
            Route::get('softDelete/{id}', [BlogController::class, 'softDelete'])->name('blogs-softDelete');
            Route::get('/showSoftDelete', [BlogController::class, 'showSoftDelete'])->name('blogs-showSoftDelete');
            Route::get('softDeleteRestore/{id}', [BlogController::class, 'softDeleteRestore'])->name('blogs-softDeleteRestore');
            Route::get('/activeInactiveSingle/{id}', [BlogController::class, 'activeInactiveSingle'])->name('blogs-activeInactiveSingle');
        });
    });
});
