<?php

use App\Http\Controllers\CurrencyController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CurrencyMerger;

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
    Route::get('admin/users/image/{id}',[UserController::class, 'getImage']);
    Route::get('admin/users/verify/{id}',[UserController::class, 'verify'])->name('users.verify');
    Route::get('admin/users/activate/{id}',[UserController::class, 'activate'])->name('users.activate');

    //Currency routes
    Route::get('admin/currency/updateAllReserve/',[CurrencyController::class,'updateAllReserve'])->name('currency.updateAllReserve');
    Route::resource('/admin/currency', CurrencyController::class);
    Route::get('admin/currency/activate/{id}',[CurrencyController::class, 'activate'])->name('currency.activate');
    Route::get('admin/currency/getReserve/{id}',[CurrencyController::class, 'getReserve'])->name('currency.getReserve');
    Route::POST('admin/currency/updateReserve',[CurrencyController::class, 'updateReserve'])->name('currency.updateReserve');
    Route::DELETE('admin/currency/delete',[CurrencyController::class, 'destroy'])->name('currency.deleteData');
    Route::POST('admin/currency/updateStore/reserve',[CurrencyController::class,'updateSaveReserve'])->name('currency.updateSave');


    //currency merge routes
    Route::get('admin/currency/merge/create', [CurrencyMerger::class, 'create'])->name('currency_merge.create');
    Route::get('admin/currency/merge/getReceiveUrl/{id}', [CurrencyMerger::class, 'getReceiveUrl'])->name('currency_merge.getReceiveUrl');
    Route::post('admin/currency/merge/store', [CurrencyMerger::class, 'store'])->name('currency_merge.store');
    Route::get('admin/currency/merge/index', [CurrencyMerger::class, 'index'])->name('currency_merge.index');
    Route::delete('admin/currency/merge/delete',[CurrencyMerger::class, 'delete'])->name('currency_merge.delete');
    Route::get('admin/currency/merge/getCurrencyDetails/{id}', [CurrencyMerger::class, 'getCurrencyDetails'])->name('currency_merge.getCurrencyDetails');
});
