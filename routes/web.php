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
Route::get('/',array('as'=>'index','uses'=>'ContactController@index'));
Route::resource('contact','ContactController');
Route::get('contact_form',array('as'=>'contact_form','uses'=>'ContactController@form'));
Route::get('regency/ajax/{id}',array('as'=>'regency.ajax','uses'=>'ContactController@regencyAjax'));
Route::get('district/ajax/{id}',array('as'=>'district.ajax','uses'=>'ContactController@districtAjax'));
Route::get('village/ajax/{id}',array('as'=>'village.ajax','uses'=>'ContactController@villageAjax'));