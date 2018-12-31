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


Route::get('/', 'PostController@index');


Route::prefix('posts')->group( function() {

    Route::post('/', 'PostController@store')->name('post.store');

    Route::name('post.create')->get('create', 'PostController@create');

    Route::name('post.show')->get('{post}', 'PostController@show');

    Route::name('post.destroy')->delete('{post}', 'PostController@destroy');

    Route::name('post.edit')->get('edit/{post}', 'PostController@edit');

    Route::name('post.update')->patch('{post}', 'PostController@update');
});


Route::delete('/comments/{comment}', 'CommentController@destroy');

Route::patch('/posts/{post}/comments', 'CommentController@store');

Auth::routes();

Route::namespace('Auth')->group(function () {

    Route::get('settings/passwordChange', 'ResetPasswordController@showChangeForm');

    Route::name('changePassword')->post('changePassword', 'ResetPasswordController@changePassword');

    Route::get('settings/emailChange', 'EmailController@showChangeForm');

    Route::post('changeEmail', 'EmailController@changeEmail')->name('changeEmail');

    Route::get('add-user', 'RegisterController@showRegistrationForm')->name('register');

    Route::get('/logout', 'LoginController@logout');

});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});