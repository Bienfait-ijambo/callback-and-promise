<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['namespace' => "Role"],function(){

   Route::get('fetch_role','RoleController@index');
   Route::get('fetch_sigle_role/{id}','RoleController@edit');
   Route::get('delete_role/{id}','RoleController@destroy');
   Route::post('insert','RoleController@store');


});

Route::group(['namespace' => "Users"],function(){

   Route::get('fetch_user','UserController@index');
   Route::post('change_pwd','UserController@changePassword');

   Route::post('insert_user','UserController@store');

   // Route::post('insert_user','UserController@store');

});