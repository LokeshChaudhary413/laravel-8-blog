<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\PageController;
use App\Http\Controllers\front\FrontController;
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

// Route::get('/', function () {
//     return view('front/index');
// });


// Front End Routes

Route::get('/',[FrontController::class, 'bloglisting']);
Route::get('/post/{id}',[FrontController::class, 'fullPost']);
Route::get('front/{id}',[FrontController::class, 'page']);


// Login Routes
Route::get('admin', [AdminController::class, 'index']);
Route::get('admin/logout', [AdminController::class, 'logout']);
Route::post('admin/auth', [AdminController::class, 'auth'])->name('admin.auth');
Route::group(['middleware'=>'admin_auth'],function(){

    Route::get('admin/dashboard', [AdminController::class, 'dashboard']);

    // Blog Routes
    Route::get('admin/posts', [BlogController::class, 'index']);
    Route::view('admin/posts/addPost', 'admin/posts/addPost');
    Route::post('admin/posts/submit', [BlogController::class, 'submit']);
    Route::get('admin/posts/editPost/{id}', [BlogController::class, 'edit']);
    Route::post('admin/posts/update/{id}', [BlogController::class, 'update']);
    Route::get('admin/posts/deletePost/{id}', [BlogController::class, 'delete']);

    // Page Routes
    Route::get('admin/pages', [PageController::class, 'index']);
    Route::view('admin/pages/addPage', 'admin/pages/addPage');
    Route::post('admin/pages/submit', [PageController::class, 'submit']);
    Route::get('admin/pages/deletePage/{id}', [PageController::class, 'delete']);
    Route::get('admin/pages/editPage/{id}', [PageController::class, 'edit']);
    Route::post('admin/pages/update/{id}', [PageController::class, 'update']);



    Route::get('admin/notifications', function () {
        return view('admin.notifications');
    });
    Route::get('admin/user', function () {
        return view('admin.user');
    });
    Route::get('admin/upgrade', function () {
        return view('admin.upgrade');
    });
    Route::get('admin/tables', function () {
        return view('admin.tables');
    });
    Route::get('admin/typography', function () {
        return view('admin.typography');
    });
    Route::get('admin/upgrade', function () {
        return view('admin.upgrade');
    });
    Route::get('admin/upgrade', function () {
        return view('admin.dashboard');
    });
});




