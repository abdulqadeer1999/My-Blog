<?php

use App\Http\Controllers\admin\ContactController;
use App\Http\Controllers\admin\PageController;
use App\Http\Controllers\Admin_auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\FrontController;

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

// home page routes 

Route::get('/',[FrontController::class,'homeData']);

Route::get('/post/{id}',[FrontController::class,'post']);


// end home page 

Route::get('admin/login',[Admin_auth::class,'login']);

Route::post('admin/login_submit',[Admin_auth::class,'login_submit'])->name('login_submit');

Route::get('/admin/logout',function () {

    session()->forget('BLOG_USER_ID');
    return redirect('/admin/login');

});

Route::group(['middleware'=>['admin_auth']],function() {

    // Posts

    Route::get('admin/post/list',[PostController::class,'post']);

    Route::get('admin/addpost',[PostController::class,'addpost']);
    Route::post('admin/post/submit',[PostController::class,'submit']);

    Route::get('admin/post/delete/{id}',[PostController::class,'delete']);

    Route::get('admin/post/edit/{id}',[PostController::class,'edit']);

    Route::post('admin/post/update/{id}',[PostController::class,'update']);

    // Pages

    Route::get('admin/page/list',[PageController::class,'page']);

    Route::get('admin/addpage',[PageController::class,'addpage']);
    Route::post('admin/page/submit',[PageController::class,'submit']);

    Route::get('admin/page/delete/{id}',[PageController::class,'delete']);

    Route::get('admin/page/edit/{id}',[PageController::class,'edit']);

    Route::post('admin/page/update/{id}',[PageController::class,'update']);

    // contact 


    Route::get('admin/contact/list',[ContactController::class,'contact']);

    
});


