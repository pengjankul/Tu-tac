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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('dashboard', 'HomeController@index')->name("dashboard");
// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/home', 'HomeController@index')->name('home');

//Route::resource('customers', 'CustomersController');

Route::resource('researchers', 'ResearchersController');

Route::resource('accountCharts', 'AccountChartController');
Route::resource('accountChartsTu', 'AccountChartTuController');

// service accounting  json
Route::get('getAccountChartJson', 'AccountChartController@getAccountChart');
Route::get('getAccount', 'AccountChartController@getAccountID');

//service accouting tu json
Route::get('getAccountChartTuJson', 'AccountChartTuController@getAccountChart');
Route::get('getAccountTu', 'AccountChartTuController@getAccountID');
Route::get('getTreeAccountTu', 'AccountChartTuController@getAccountTree');

//insert data tmp account charts
Route::get('insertAccount', 'AccountChartController@insertAccountTmp');

//export
Route::get('accTuAcc/export', 'AccountChartController@export'); //ผังบัญชี tu rac
Route::get('accTu/export', 'AccountChartTuController@export'); //ผังบัญชี มธ


Route::resource('institutions', 'InstitutionsController');

Route::resource('accountAssets', 'AccountAssetController');