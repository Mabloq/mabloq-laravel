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

//Authentication Routes
Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
Route::post('login', ['as' => 'login.post', 'uses' => 'Auth\LoginController@login']);
Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);

//Registration Routes
//Route::get('register', ['as' => 'register', 'uses' => 'Auth\RegisterController@showRegistrationForm']);
//Route::post('register', ['as' => 'register.post', 'uses' => 'Auth\RegisterController@register']);

//Password Reset Routes
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token?}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset}', 'Auth\ResetPasswordController@reset');
//Blog Routes
Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])->where('slug', '[\w\d\-\_]+');
Route::get('blog/categories/{category_id}', ['as' => 'blog.category', 'uses' => 'BlogController@getCategory']);
Route::get('/blog', ['as' => 'blog.index', 'uses' => 'BlogController@getIndex']);
Route::get('blog/tags/{tag_id}', ['as' => 'blog.tag', 'uses' => 'BlogController@getTag']);


//Page Routes
Route::get('/about', 'PagesController@getAbout');
Route::get('/contact', 'PagesController@getContact');
Route::post('/contact', 'PagesController@postContact');
Route::get('/', 'PagesController@getIndex');

//Post Routes
Route::resource('posts', 'PostController');

//Category Routes
Route::resource('categories', 'CategoryController', ['except' => ['create']]);

//Tag Routes
Route::resource('tags', 'TagController', ['except' => ['create']]);

//Comment Routes
//Route:resource('comments', 'CommentsController');
Route::post('comments/{post_id}', ['uses' => 'CommentsController@store', 'as' => 'comments.store']);
Route::get('comments/{id}/edit', ['uses' => 'CommentsController@edit', 'as' => 'comments.edit']);
Route::put('comments/{id}', ['uses' => 'CommentsController@update', 'as' => 'comments.update']);
Route::delete('comments/{id}', ['uses' => 'CommentsController@destroy', 'as' => 'comments.destroy']);
Route::get('comments/{id}/delete', ['uses' => 'CommentsController@delete', 'as' => 'comments.delete']);

//Project Routes
Route::resource('projects', 'ProjectController');

//Portfolio Routes
Route::get('/portfolio', ['as' => 'portfolio.index', 'uses' => 'PortfolioController@getIndex']);
Route::post('/portfolio-read', 'PortfolioController@readPortfolio');
Route::get('/project/{url}', 'PortfolioController@getPage');
Route::get('/make/xml', 'PortfolioController@getxml');


//Youtube Routes
Route::get('/playlist', 'YoutubeController@getPlayList');
Route::get('/render-playlist', 'YoutubeController@renderPlayList');
Route::post('/next-page', 'YoutubeController@getNextPage');
Route::middleware('cors')->get('/restaurants/map', 'PagesController@getMap');
