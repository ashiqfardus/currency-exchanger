<?php

use App\Http\Controllers\CurrencyController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
})->name('/');

Auth::routes();


//User middleware & routes
Route::middleware(['auth', 'user-access:user','user-verify','user-active'])->group(function(){
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
Route::middleware(['auth', 'user-access:user'])->group(function(){
    Route::get('/verification', [HomeController::class, 'verification'])->name('verification');
    Route::get('/not_active', [HomeController::class, 'is_active'])->name('not_active');
});


Route::middleware(['auth'])->group(function(){
    Route::get('/error403', [HomeController::class, 'error403'])->name('error403');
});



// Admin middleware & routes

Route::get('admin',function (){
    return redirect('/admin/home');
});
Route::middleware(['auth','user-access:admin'])->group(function (){
    Route::get('admin/home', [HomeController::class,'adminIndex'])->name('admin.index');

    //user manage routes
    Route::resource('admin/users',UserController::class);
    Route::get('admin/users/verify/{id}',[UserController::class, 'verify'])->name('users.verify');
    Route::get('admin/users/activate/{id}',[UserController::class, 'activate'])->name('users.activate');

    //Currency routes
    Route::resource('/admin/currency', CurrencyController::class);
});
