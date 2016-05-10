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
    Route::get('feedback','HomeController@showFeedback');
    
});

Route::group(['middleware' => ['web']], function () {
    Route::get('wsw',function(){
        return view('wanshiwu.home');
    });
    Route::get('/',function(){
        return view('welcome');
    });

    Route::group(['prefix' => 'sell'], function () {
        Route::get('','GuestController@sellHome');
        Route::get('detail/{sell}','GuestController@showSellDetail');
        Route::get('edit/{sell}','HomeController@showSellEdit');
        Route::post('','HomeController@addSell');
        Route::patch('/{sell}','HomeController@editSell');
        Route::delete('/{sell}','HomeController@deleteSell');
    });
    
    
    Route::group(['prefix' => 'exchange'], function () {
        Route::get('','GuestController@showCourseHome');
        Route::get('detail/{course}','GuestController@showCourseDetail');
        Route::get('edit/{course}','HomeController@showExchangeEdit');
        Route::post('','HomeController@addExchange');
        Route::post('comment','HomeController@commentExchange');
        Route::patch('/{course}','HomeController@editExchange');
        Route::delete('/{course}','HomeController@deleteExchange');
        Route::delete('comment/{courseComment}','HomeController@deleteExchangeComment');
    });
    Route::group(['prefix' => 'partTime'], function () {
        Route::get('','GuestController@showPartTime');
        Route::get('detail/{partTime}','GuestController@showPartTimeDetail');
        Route::get('edit/{partTime}','HomeController@showeditPartTime');
        Route::post('','HomeController@addPartTime');
        Route::patch('edit/{partTime}','HomeController@editPartTime');
        Route::delete('/{partTime}','HomeController@deletePartTime');
    });
    Route::group(['prefix' => 'transport'], function () {
        Route::get('','GuestController@showTransport');
        Route::get('detail/{transport}','HomeController@showTransportDetail');
        Route::get('cancel/{transport}','HomeController@cancelTransport');
        Route::post('detail/{transport}','HomeController@showTransportDetailAccept');
        Route::post('','HomeController@addTransport');
        Route::delete('/{transport}','HomeController@deleteTransport');
    });
    Route::group(['prefix' => 'found'], function () {
        Route::get('','GuestController@showFound');
        Route::get('publish','HomeController@showFoundPublish');
        Route::get('detail/{found}','GuestController@showFoundDetail');
        Route::post('','HomeController@createFound');
    });
    Route::group(['prefix' => 'lost'], function () {
        Route::get('','GuestController@showLost');
        Route::get('publish','HomeController@showLostPublish');
        Route::get('detail/{lost}','GuestController@showLostDetail');
        Route::post('add','HomeController@createLost');
    });
    Route::group(['prefix' => 'playground'], function () {
        Route::get('','GuestController@showPlayground');
        Route::get('detail/{post}','GuestController@showPlaygroundDetail');
        Route::post('','HomeController@createPlayground');
    });
    
});


