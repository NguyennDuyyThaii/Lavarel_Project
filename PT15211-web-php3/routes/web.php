<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VovController;
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




// Route::get('danh-muc', [CategoryController::class, 'index'])->name('cate.index');
// Route::get('danh-muc/{id}/remove', 
//             [CategoryController::class, 'remove'])->name('cate.remove');
            
// Route::get('danh-muc/add', [CategoryController::class, 'addForm'])->name('cate.add');
// Route::post('danh-muc/add', [CategoryController::class, 'saveAdd']);

// Route::get('danh-muc/edit/{id}', [CategoryController::class, 'editForm'])->name('cate.edit');
// Route::post('danh-muc/edit/{id}', [CategoryController::class, 'saveEdit']);

// Route::get('san-pham', [ProductController::class, 'index'])->name('product.index');
// Route::get('hoa-don', [OrderController::class, 'index'])->name('order.index');

//site 
Route::get('/test', [HomeController::class, 'test'])->name('test'); 
Route::get('', [HomeController::class, 'index'])->name('homepage');
Route::get('/category-posts/{id}', [HomeController::class, 'categoryPost'])->name('category.post');
Route::get('/detail-posts/{id}', [HomeController::class, 'detailPost'])->name('post.detail');
Route::post('/detail-post/increase-view', [HomeController::class, 'increaseView'])->name('increase.view');
Route::get('/top-post-view', [HomeController::class, 'topPostView'])->name('topPostView');

// admin
Route::prefix('dashboard')
   
    ->group(function(){
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'postLogin'])->name('post.login');
    
    Route::get('user', [AuthController::class, 'user'])->name('user.index');
    
    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::post('register', [AuthController::class, 'postRegister'])->name('post.register');
    Route::get('login/verify', [AuthController::class, 'verify'])->name('verify.user');
    
    Route::get('', [AuthController::class, 'dashboard'])->name('auth');
    
    Route::get('category', [CategoryController::class, 'categoryList'])->name('category.index');
    Route::get('add-category', [CategoryController::class, 'categoryAdd'])->name('category.add');
    Route::post('add-category', [CategoryController::class, 'categoryPostAdd'])->name('category.post.add');
    Route::get('delete-category/{id}', [CategoryController::class, 'categoryDelete'])->name('category.delete');
    Route::get('edit-category/{id}', [CategoryController::class, 'categoryEdit'])->name('category.edit');
    Route::post('edit-category/{id}', [CategoryController::class, 'categoryPostEdit'])->name('category.post.edit');
    
    Route::get('post', [PostController::class, 'postList'])->name('post.index');
    Route::get('add-post', [PostController::class, 'postAdd'])->name('post.add');
    Route::post('add-post', [PostController::class, 'postPostAdd'])->name('post.post.add');
    Route::get('delete-post/{id}', [PostController::class, 'postDelete'])->name('post.delete');
    Route::get('edit-post/{id}', [PostController::class, 'postEdit'])->name('post.edit');
    Route::post('edit-post/{id}', [PostController::class, 'postPostEdit'])->name('post.post.edit');



    Route::get('crawl-web-vov', [VovController::class, 'index'])->name('vov.index');
    Route::get('add-crawl-web-vov', [VovController::class, 'add'])->name('vov.add');
    Route::post('add-crawl-web-vov', [VovController::class, 'addVOV']);
    Route::get('delete-crawl-web-vov/{id}', [VovController::class, 'delete'])->name('vov.delete');
});
