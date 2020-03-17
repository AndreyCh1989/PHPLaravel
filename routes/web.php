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
        Route::get('/401', function() { return view('401'); } ) -> name('401');
        Route::get('/categories', 'CategoriesController@get') -> name('categories');
        Route::group([
                'prefix' => 'news',
                'as' => 'news.'
            ], function () {
                Route::get('/category/{category}', 'NewsController@getByCategory') -> name('getByCategory');
                Route::get('/all', 'NewsController@all') -> name('all');
                Route::get('/fetch', 'NewsProviderController@fetch') -> name('ext');
                Route::resource('/resource', 'ResourceController')->except('create', 'show', 'update', 'edit');
            }
        );

        Route::resource('news', 'NewsController')->except('index');
        Route::resource('user', 'UserController')->except('store', 'create', 'destroy', 'show')->middleware('is_admin');

        Route::get('/about', 'AboutController@get') -> name('about');
    }
);

Route::group([
    'prefix' => 'facebook',
    'as' => 'facebook.'
], function () {
    Route::get('/open', 'FacebookController@open') -> name('open');
    Route::get('/redirect', 'FacebookController@redirect') -> name('redirect');
});

Auth::routes();
