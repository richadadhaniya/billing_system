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
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware'=>'auth'],function (){

// home


// clint
// client data
Route::get('clientdetail{id}','AjaxController@client_detail')->name('client.detail');
// category


// store product
Route::get('bill{id}','BillController@bill')->name('bill');
Route::post('storebill','BillController@store_bill')->name('store.bill');

// viewbill
Route::get('view_bill{id}','BillController@view_bill')->name('view.bill');
// editbill
Route::get('editbill{id}','AjaxController@edit_bill')->name('edit.bill');
Route::post('updatebill','AjaxController@update_bill')->name('update.bill');
// delete
Route::get('deletebill{id}','AjaxController@delete_bill')->name('delete.bill');

// pdf

Route::get('generate-pdf{id}','AjaxController@generatePDF')->name('generate.pdf');

Route::resource('ajax-postssss', 'AjaxController');

Route::resource('ajax-posts', 'AjaxPostController');


Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
});
Auth::routes();