<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ReservationController as AdminReservationController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

// Route::get('/verification/{user}/{token}', [RegisterController::class, 'verification']);



Route::group(['middleware' => ['auth', 'verified']], function () {

    Route::group(['middleware' => ['auth', 'admin']], function () {


        Route::get('/home', [HomeController::class, 'index'])->name('home');




        Route::resource('inventory/products', 'App\Http\Controllers\ProductController');
        Route::get('/productPDF', [ProductController::class, 'productPDF']);
        Route::resource('inventory/categories', 'App\Http\Controllers\ProductCategoryController');
        Route::get('/categoryPDF', [ProductCategoryController::class, 'categoryPDF']);
        Route::resource('users', 'App\Http\Controllers\UserController');
        Route::resource('clients', 'App\Http\Controllers\ClientController');
        // Route::resource('transactions/transfer', 'App\Http\Controllers\TransferController');
        // Route::resource('methods', 'App\Http\Controllers\MethodController');
        Route::resource('invoices', 'App\Http\Controllers\InvoiceController');
        Route::get('/generatePDF/{id}', [InvoiceController::class, 'generatePDF']);
        // Route::resource('providers', 'App\Http\Controllers\ProviderController');

        // Route::resource('transactions', 'App\Http\Controllers\TransactionController')->except(['create', 'show']);
        // Route::get('transactions/stats/{year?}/{month?}/{day?}', ['as' => 'transactions.stats', 'uses' => 'App\Http\Controllers\TransactionController@stats']);
        // Route::get('transactions/{type}', ['as' => 'transactions.type', 'uses' => 'App\Http\Controllers\TransactionController@type']);
        // Route::get('transactions/{type}/create', ['as' => 'transactions.create', 'uses' => 'App\Http\Controllers\TransactionController@create']);
        // Route::get('transactions/{transaction}/edit', ['as' => 'transactions.edit', 'uses' => 'App\Http\Controllers\TransactionController@edit']);

        // Route::get('inventory/stats/{year?}/{month?}/{day?}', ['as' => 'inventory.stats', 'uses' => 'App\Http\Controllers\InventoryController@stats']);
        // Route::resource('inventory/receipts', 'App\Http\Controllers\ReceiptController')->except(['edit', 'update']);
        // Route::get('inventory/receipts/{receipt}/finalize', ['as' => 'receipts.finalize', 'uses' => 'App\Http\Controllers\ReceiptController@finalize']);
        // Route::get('inventory/receipts/{receipt}/product/add', ['as' => 'receipts.product.add', 'uses' => 'App\Http\Controllers\ReceiptController@addproduct']);
        // Route::get('inventory/receipts/{receipt}/product/{receivedproduct}/edit', ['as' => 'receipts.product.edit', 'uses' => 'App\Http\Controllers\ReceiptController@editproduct']);
        // Route::post('inventory/receipts/{receipt}/product', ['as' => 'receipts.product.store', 'uses' => 'App\Http\Controllers\ReceiptController@storeproduct']);
        // Route::match(['put', 'patch'], 'inventory/receipts/{receipt}/product/{receivedproduct}', ['as' => 'receipts.product.update', 'uses' => 'App\Http\Controllers\ReceiptController@updateproduct']);
        // Route::delete('inventory/receipts/{receipt}/product/{receivedproduct}', ['as' => 'receipts.product.destroy', 'uses' => 'App\Http\Controllers\ReceiptController@destroyproduct']);

        // Route::resource('sales', 'App\Http\Controllers\SaleController')->except(['edit', 'update']);
        // Route::get('sales/{sale}/finalize', ['as' => 'sales.finalize', 'uses' => 'App\Http\Controllers\SaleController@finalize']);
        // Route::get('sales/{sale}/product/add', ['as' => 'sales.product.add', 'uses' => 'App\Http\Controllers\SaleController@addproduct']);
        // Route::get('sales/{sale}/product/{soldproduct}/edit', ['as' => 'sales.product.edit', 'uses' => 'App\Http\Controllers\SaleController@editproduct']);
        // Route::post('sales/{sale}/product', ['as' => 'sales.product.store', 'uses' => 'App\Http\Controllers\SaleController@storeproduct']);
        // Route::match(['put', 'patch'], 'sales/{sale}/product/{soldproduct}', ['as' => 'sales.product.update', 'uses' => 'App\Http\Controllers\SaleController@updateproduct']);
        // Route::delete('sales/{sale}/product/{soldproduct}', ['as' => 'sales.product.destroy', 'uses' => 'App\Http\Controllers\SaleController@destroyproduct']);

        // Route::get('clients/{client}/transactions/add', ['as' => 'clients.transactions.add', 'uses' => 'App\Http\Controllers\ClientController@addtransaction']);

        Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
        Route::match(['put', 'patch'], 'profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
        Route::match(['put', 'patch'], 'profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);



        // Reservation


        Route::get('/reshome','App\Http\Controllers\HomeReservationController@index')->name('index');

        Route::get('dashboard', 'App\Http\Controllers\Reservation\DashboardController@index')->name('admin.dashboard');
        Route::resource('slider','App\Http\Controllers\Reservation\SliderController');
        Route::resource('category','App\Http\Controllers\Reservation\CategoryController');
        Route::resource('item','App\Http\Controllers\Reservation\ItemController');
        Route::get('reservation','App\Http\Controllers\Reservation\ReservationController@index')->name('reservation.index');
        Route::post('reservation/{id}','App\Http\Controllers\Reservation\ReservationController@status')->name('reservation.status');
        Route::delete('reservation/{id}','App\Http\Controllers\Reservation\ReservationController@destroy')->name('reservation.destroy');
        Route::post('/reservation1',[AdminReservationController::class,'reserve'])->name('reservation.reserve');

        Route::get('contact','App\Http\Controllers\Reservation\ContactController@index')->name('contact.index');
        Route::get('contact/{id}','App\Http\Controllers\Reservation\ContactController@show')->name('contact.show');
        Route::delete('contact/{id}','App\Http\Controllers\Reservation\ContactController@destroy')->name('contact.destroy');
    });
});


    Route::group(['middleware' => ['auth', 'user']], function () {
    Route::get('/userres','App\Http\Controllers\Reservation\UserReservationController@index');
    Route::post('/reservation1','App\Http\Controllers\ReservationController@reserve')->name('reservation.reserve');
    Route::post('/contact','App\Http\Controllers\ContactController@sendMessage')->name('contact.send');
});


