<?php

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
Auth::routes();

Route::get('/', 'MainController@index')->name('main');

Route::get('about', function () {
    return view('pages.about');
})->name('about');

Route::get('news', function () {
    return view('news.list');
})->name('news');

Route::group(['prefix' => 'categories'], function () {
    Route::get('{category}', 'CategoriesController@show')->name('categories.show');
    Route::get('{category}/{product}', 'ProductsController@show')
        ->name('categories.product.show');
});

Route::group(['prefix' => 'cart', 'middleware' => 'auth'], function () {
    Route::get('/', 'CartController@index')->name('cart');
    Route::get('add/{product}', 'CartController@add')->name('cart.product.add');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'is_admin']], function () {
    Route::get('/', function () {
        return view('admin.admin');
    })->name('admin');

    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', 'Admin\CategoriesController@show')
            ->name('admin.categories.show');
        Route::get('create', 'Admin\CategoriesController@create')
            ->name('admin.categories.create');
        Route::get('edit/{category}', 'Admin\CategoriesController@edit')
            ->name('admin.categories.edit');

        Route::post('add', 'Admin\CategoriesController@add')
            ->name('admin.categories.add');
        Route::post('update', 'Admin\CategoriesController@update')
            ->name('admin.categories.update');
        Route::get('destroy/{id}', 'Admin\CategoriesController@destroy')
            ->name('admin.categories.destroy');
    });

    Route::group(['prefix' => 'products'], function () {
        Route::get('/', 'Admin\ProductsController@show')
            ->name('admin.products.show');
        Route::get('create', 'Admin\ProductsController@create')
            ->name('admin.products.create');
        Route::get('edit/{product}', 'Admin\ProductsController@edit')
            ->name('admin.products.edit');

        Route::post('add', 'Admin\ProductsController@add')
            ->name('admin.products.add');
        Route::post('update', 'Admin\ProductsController@update')
            ->name('admin.products.update');
        Route::get('destroy/{id}', 'Admin\ProductsController@destroy')
            ->name('admin.products.destroy');
    });

    Route::get('/orders', 'Admin\OrdersController@show')
        ->name('admin.orders.show');

    Route::group(['prefix' => 'users'], function () {
        Route::get('/', 'Admin\UsersController@show')->name('admin.users.show');
        Route::get('edit/{user}', 'Admin\UsersController@edit')
            ->name('admin.users.edit');
        Route::post('update', 'Admin\UsersController@update')
            ->name('admin.users.update');
    });
});
