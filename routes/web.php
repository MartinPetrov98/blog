<?php
use Illuminate\Http\Request;
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

//Route::get('/', 'ArticleController@index');

Route::get('/', 'ArticleController@index');



Route::get('/article/{title}', 'ArticleController@show');

Route::post('/article', 'ArticleController@store');

//Retriving article's comments and users test

//Route::get('test', 'ArticleController@test');

Route::post('post','CommentController@store');

Route::get('search/{q}','SearchController@globalSearch');


Route::put('article/{id}', 'ArticleController@edit');

//Route::delete('article/{id}', function($id){
//    return $id. 'deleted';
//});

Route::delete('article/{id}','ArticleController@destroy');


//Route::get('/admin',function (){
//    return 'I am the boss!';
//})->middleware('admin');

Auth::routes(['verify' => true]);



//Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'roles'], 'roles' => 'admin'], function () {
//    Route::get('/', ['uses' => 'AdminController@index']);
//});

//
//Route::group('prefix' => 'admin', function () {
////    Route::get('/', ['uses' => 'AdminController@index']);
//})->middleware('admin');
//Auth::routes();



Route::group(['middleware' => 'admin'], function() {
    Route::get('admin', 'Admin\AdminController@index');
    Route::resource('admin/roles', 'Admin\RolesController');
    Route::resource('admin/permissions', 'Admin\PermissionsController');
    Route::resource('admin/users', 'Admin\UsersController');
    Route::resource('admin/pages', 'Admin\PagesController');

    Route::resource('admin/activitylogs', 'Admin\ActivityLogsController')->only([
        'index', 'show', 'destroy'
    ]);


    Route::resource('admin/settings', 'Admin\SettingsController');
    Route::get('admin/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@getGenerator']);
    Route::post('admin/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@postGenerator']);



});





