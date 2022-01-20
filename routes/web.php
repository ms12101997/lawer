<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\admin\DiscussController;
use App\Http\Controllers\admin\SliderController;
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

Auth::routes();
Route::get('/', function () {
    return view('auth.login');
});
Route::get('/index', [AdminController::class, 'index'])->name('adminpage');;

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('services', ServiceController::class);
Route::resource('discuss', DiscussController::class);
Route::resource('slider', SliderController::class);
