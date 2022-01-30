<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\admin\DiscussController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\admin\ContactController;
use App\Http\Controllers\admin\LawerController;
use App\Http\Controllers\admin\welcomeController;
use App\Http\Controllers\admin\WhoController;
use App\Http\Controllers\admin\SocialController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Auth;
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
Route::prefix('admin')->group(function () {

    Route::get('/', function () {
        return view('auth.login');
    });

});



Route::prefix('admin')->group(function () {

    Auth::routes();

});



Route::middleware(['auth'])->prefix('admin')->group( function () {

    Route::get('/index', [AdminController::class, 'index'])->name('adminpage');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

        
    Route::resource('services', ServiceController::class);
    Route::resource('discuss', DiscussController::class);
    Route::resource('slider', SliderController::class);
    Route::resource('contact', ContactController::class);
    Route::resource('lawer', lawerController::class);
    Route::resource('welcome', welcomeController::class);
    Route::resource('who', WhoController::class);
    Route::resource('social', SocialController::class);

    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});






