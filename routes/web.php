<?php

use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\FrontendIndexController;
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

AcceptCookies::routes();
Route::get('/', [FrontendIndexController::class, 'index'])->name('/');

Auth::routes();


//index page routes
Route::get('getReceiveCurrencyDetailsBySendCurrencyId/{id}', [FrontendIndexController::class, 'getReceiveCurrency'])->name('getReceiveCurrency');


//User middleware & routes
Route::middleware(['auth', 'user-access:user','user-verify','user-active'])->group(function(){
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::post('/place-order', [FrontendIndexController::class, 'placeOrder'])->name('order.place');
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
Route::middleware(['auth','user-access:admin'])->prefix('admin')->group(function (){
    Route::get('/home', [HomeController::class,'adminIndex'])->name('admin.index');

    //user manage routes
    Route::resource('/users',UserController::class);
    Route::get('/users/image/{id}',[UserController::class, 'getImage']);
    Route::get('/users/verify/{id}',[UserController::class, 'verify'])->name('users.verify');
    Route::get('/users/activate/{id}',[UserController::class, 'activate'])->name('users.activate');

    //Currency routes
    Route::get('/currency/updateAllReserve/',[CurrencyController::class,'updateAllReserve'])->name('currency.updateAllReserve');
    Route::resource('/currency', CurrencyController::class);
    Route::get('/currency/activate/{id}',[CurrencyController::class, 'activate'])->name('currency.activate');
    Route::get('/currency/getReserve/{id}',[CurrencyController::class, 'getReserve'])->name('currency.getReserve');
    Route::POST('/currency/updateReserve',[CurrencyController::class, 'updateReserve'])->name('currency.updateReserve');
    Route::DELETE('/currency/delete',[CurrencyController::class, 'destroy'])->name('currency.deleteData');
    Route::POST('/currency/updateStore/reserve',[CurrencyController::class,'updateSaveReserve'])->name('currency.updateSave');


    //currency merge routes
    Route::get('/currency/merge/create', [CurrencyMerger::class, 'create'])->name('currency_merge.create');
    Route::get('/currency/merge/getReceiveUrl/{id}', [CurrencyMerger::class, 'getReceiveUrl'])->name('currency_merge.getReceiveUrl');
    Route::post('/currency/merge/store', [CurrencyMerger::class, 'store'])->name('currency_merge.store');
    Route::get('/currency/merge/index', [CurrencyMerger::class, 'index'])->name('currency_merge.index');
    Route::delete('/currency/merge/delete',[CurrencyMerger::class, 'delete'])->name('currency_merge.delete');
    Route::get('/currency/merge/getCurrencyDetails/{id}', [CurrencyMerger::class, 'getCurrencyDetails'])->name('currency_merge.getCurrencyDetails');
    Route::POST('/currency/merge/updateMerger',[CurrencyMerger::class, 'updateMerger'])->name('currency.updateMerger');
});
