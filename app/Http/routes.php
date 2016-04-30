<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
    Route::get('owner/{user}','HomeController@showOwner');
    Route::get('modifyInfo','HomeController@showEditOwner');
    Route::get('bindingEmail','HomeController@showEmail');
    Route::post('bindingEmail/{user}','HomeController@bindingEmail');
    Route::get('bindingPhone','HomeController@showPhone');
    Route::get('modifyPassword','HomeController@showPassword');
    
});

Route::group(['middleware' => ['web']], function () {
    Route::get('wsw',function(){
        return view('wanshiwu.home');
    });
    Route::get('/',function(){
        return view('welcome');
    });
    Route::get('sell','GuestController@sellHome');
    Route::get('sellDetail/{sell}','GuestController@showSellDetail');

    Route::get('sellEdit',function(){
        return view('wanshiwu.sellEdit');
    });
    Route::get('exchange','GuestController@showCourseHome');
    Route::get('exchangeDetail/{course}','GuestController@showCourseDetail');
    Route::get('exchangeEdit',function(){
        return view('wanshiwu.exchange.edit');
    });
    Route::get('partTime','GuestController@showPartTime');
    Route::get('partTimeDetail','GuestController@showPartTimeDetail');

    Route::get('playground','GuestController@showPlayground');
    Route::get('test',function(){

    });
});


