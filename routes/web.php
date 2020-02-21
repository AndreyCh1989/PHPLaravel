<?php

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

Route::group([
        'namespace' => 'ProjectControllers'
    ], function () {
        Route::get('/', 'HiController@index') -> name('index');
        Route::get('/categories', 'CategoriesController@get') -> name('categories');
        Route::group([
                'prefix' => 'news',
                'as' => 'news.'
            ], function () {
                Route::get('/category/{category_id}', 'NewsController@getByCategory') -> name('getByCategory');
                Route::get('/one/{id}', 'NewsController@get') -> name('one');
                Route::match(['get', 'post'],'/add', 'NewsController@add') -> name('add');
            }
        );

        Route::get('/about', 'AboutController@get') -> name('about');
    }
);

Auth::routes();
