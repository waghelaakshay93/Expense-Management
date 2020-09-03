<?php

// Swapnil Phanse
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
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
		Route::get('icons', ['as' => 'pages.icons', 'uses' => 'PageController@icons']);
		Route::get('maps', ['as' => 'pages.maps', 'uses' => 'PageController@maps']);
		Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'PageController@notifications']);
		Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'PageController@rtl']);
		Route::get('tables', ['as' => 'pages.tables', 'uses' => 'PageController@tables']);
		Route::get('typography', ['as' => 'pages.typography', 'uses' => 'PageController@typography']);
		Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'PageController@upgrade']);
});

Route::get('search','SearchController@index');
Route::get('/search','SearchController@search')->name('search');
Route::post('adduser','AdduserController@insert');
Route::get('addexpense','AddExpenseController@index')->name('addexpense');
Route::post('/addexpense','AddExpenseController@storeexpense')->name('sexpense');
Route::get('/viewexpense/{exp}','ViewExpenseController@index')->name('viewexpense');

Route::get('/group','GroupController@index')->name('group');
Route::get('addgroup','GroupController@insert')->name('addgroup');
// Route::get('addgroupmembers/{groupID}','GroupController@insertmembers');
Route::get('addgroupexpense/{groupID}','AddExpenseController@groupIndex');
Route::post('/storeexpensegroup','AddExpenseController@storeexpensegroup')->name('storeexpensegroup');
Route::get('/viewgroupexpense/{exp}','ViewGroupExpenseController@index')->name('viewgroupexpense');
Route::get('/viewitemexpense/{exp}','ViewGroupExpenseController@expenseindex')->name('viewitemexpense');

Route::post('autocomplete', 'AutocompleteController@autocomplete')->name('autocomplete');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

