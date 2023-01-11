<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Auth::routes(['verify' => true]);


//User middleware & routes
Route::middleware('auth', 'verified')->group(function(){
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

//Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('verified','auth');
//Route::get('/admin/home', [HomeController::class,'adminIndex'])->name('admin.index')->middleware('admin');

// Admin middleware & routes
Route::middleware('admin')->group(function (){
    Route::get('/admin/home', [HomeController::class,'adminIndex'])->name('admin.index');
});
