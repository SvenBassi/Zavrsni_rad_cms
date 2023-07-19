<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\UserMiddleware;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\NavigationController;

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
    return view('auth.login');
});


Route::middleware(['auth'])->group(function(){
    Route::middleware(['isAdmin'])->group(function(){
       
        Route::get('/home', [HomeController::class, 'index'])->name('home');
        Route::resource('/users', UserController::class);
          Route::resource('/roles', RoleController::class);
          Route::resource('/lists', ListController::class);
          Route::resource('/navigations', NavigationController::class)->except(['show']);
      
    });

    Route::middleware(['isUser'])->group(function(){
    });
});


Auth::routes();




