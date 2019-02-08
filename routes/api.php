<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); /*
//list the users request(yet all requests in the table)
Route::get('requests','RequestController@index');

//List single request
Route::get('request/{id}','RequestController@show');

//create new request
Route::post('request','RequestController@store');

//Update request
Route::put('request','RequestController@store');

//Delete request
Route::delete('request/{id}','RequestController@destroy');
*/


Route::get('requests','Api\AssetRequestController@index');
Route::post('request/store','Api\AssetRequestController@store');
Route::delete('request/delete/{id}','Api\AssetRequestController@destroy');
Route::get('request/edit/{id}','Api\AssetRequestController@edit');
Route::put('request/update/{id}','Api\AssetRequestController@update');
Route::put('request/approve/{id}','Api\AssetRequestController@approve');
Route::put('request/reject/{id}','Api\AssetRequestController@reject');

Route::get('transfers','Api\AssetTransferController@index');
Route::post('transfer/store','Api\AssetTransferController@store');
Route::delete('transfer/delete/{id}','Api\AssetTransferController@destroy');

Route::get('export', 'Api\ExportController@export');
Route::get('exportView', 'Api\ExportController@exportView');
Route::get('getFormData', 'Api\AssetRequestController@getFormData');
Route::get('getDepartmentData', 'Api\AssetTransferController@getDepartmentData');
Route::get('getUserData', 'Api\AssetTransferController@getUserData');
Route::get('getAssetID', 'Api\AssetTransferController@getAssetID');
Route::get('getAssetType', 'Api\AssetTransferController@getAssetType');
Route::get('show', 'Api\AssetTransferController@shows');
//Route::post('import', 'MyController@import')->name('import');

//Route::get('request/view','Api\AssetRequestController@index');