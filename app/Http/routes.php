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
    
    Route::get('bindingPhone','HomeController@showPhone');
    Route::get('modifyPassword','HomeController@showPassword');
    Route::get('feedback','HomeController@showFeedback');
    Route::post('feedback','HomeController@saveFeedback');
    Route::post('bindingEmail/{user}','HomeController@bindingEmail');
    Route::patch('modifyPassword/{user}','HomeController@updatePassword');
    Route::patch('modifyInfo/{user}','HomeController@updateOwnerInfo');
    
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
        Route::post('search','GuestController@searchSell');
        Route::patch('/{sell}','HomeController@editSell');
        Route::delete('/{sell}','HomeController@deleteSell');
    });
    Route::group(['prefix' => 'exchange'], function () {
        Route::get('','GuestController@showCourseHome');
        Route::get('detail/{course}','GuestController@showCourseDetail');
        Route::get('edit/{course}','HomeController@showExchangeEdit');
        Route::post('','HomeController@addExchange');
        Route::post('comment','HomeController@commentExchange');
        Route::post('search','GuestController@searchCourse');
        Route::patch('/{course}','HomeController@editExchange');
        Route::delete('/{course}','HomeController@deleteExchange');
        Route::delete('comment/{courseComment}','HomeController@deleteExchangeComment');
    });
    Route::group(['prefix' => 'partTime'], function () {
        Route::get('','GuestController@showPartTime');
        Route::get('detail/{partTime}','GuestController@showPartTimeDetail');
        Route::get('edit/{partTime}','HomeController@showeditPartTime');
        Route::post('','HomeController@addPartTime');
        Route::post('search','GuestController@searchPartTime');
        Route::patch('edit/{partTime}','HomeController@editPartTime');
        Route::delete('/{partTime}','HomeController@deletePartTime');
    });
    Route::group(['prefix' => 'transport'], function () {
        Route::get('','GuestController@showTransport');
        Route::get('detail/{transport}','HomeController@showTransportDetail');
        Route::get('cancel/{transport}','HomeController@cancelTransport');
        Route::get('edit/{transport}','HomeController@showEditTransport');
        Route::post('detail/{transport}','HomeController@showTransportDetailAccept');
        Route::post('search','GuestController@searchTransport');
        Route::post('','HomeController@addTransport');
        Route::patch('edit/{transport}','HomeController@editTransport');
        Route::delete('/{transport}','HomeController@deleteTransport');
    });
    Route::group(['prefix' => 'found'], function () {
        Route::get('','GuestController@showFound');
        Route::get('publish','HomeController@showFoundPublish');
        Route::get('detail/{found}','GuestController@showFoundDetail');
        Route::post('','HomeController@createFound');
        Route::post('search','GuestController@searchFound');
        Route::delete('/{found}','HomeController@deleteFound');
    });
    Route::group(['prefix' => 'lost'], function () {
        Route::get('','GuestController@showLost');
        Route::get('publish','HomeController@showLostPublish');
        Route::get('detail/{lost}','GuestController@showLostDetail');
        Route::post('add','HomeController@createLost');
        Route::post('search','GuestController@searchLost');
        Route::delete('/{lost}','HomeController@deleteLost');
    });
    Route::group(['prefix' => 'playground'], function () {
        Route::get('','GuestController@showPlayground');
        Route::get('detail/{post}','GuestController@showPlaygroundDetail');
        Route::post('','HomeController@createPlayground');
        Route::post('search','GuestController@searchPlayground');
    });
    
});

Route::group(['prefix' => 'admin','middleware' => ['web','auth','role:admin']], function(){
    Route::get('','AdminController@index');
    
    Route::group(['prefix' => 'user'], function() {
        Route::get('','AdminController@showUser');
        Route::delete('/{user}','AdminController@deleteUser');
    });
    Route::group(['prefix' => 'course'], function() {
        Route::get('','AdminController@showCourse');
        Route::get('edit/{course}','AdminController@showEditCourse');
        Route::get('detail/{course}','AdminController@showCourseDetail');
        Route::patch('edit/{course}','AdminController@editCourse');
        Route::delete('/{course}','AdminController@deleteCourse');
    });
    Route::group(['prefix' => 'sell'], function () {
        Route::get('','AdminController@showSell');
        Route::get('edit/{sell}','AdminController@showEditSell');
        Route::get('detail/{sell}','AdminController@showSellDetail');
        Route::patch('edit/{sell}','AdminController@editSell');
        Route::delete('/{sell}','AdminController@deleteSell');
    });
    Route::group(['prefix' => 'partTime'], function () {
        Route::get('','AdminController@showPartTime');
        Route::get('edit/{partTime}','AdminController@showEditPartTime');
        Route::get('detail/{partTime}','AdminController@showPartTimeDetail');
        Route::patch('edit/{partTime}','AdminController@editPartTime');
        Route::delete('/{partTime}','AdminController@deletePartTime');
    });
    Route::group(['prefix' => 'transport'], function () {
        Route::get('','AdminController@showTransport');
        Route::get('edit/{transport}','AdminController@showEditTransport');
        Route::get('detail/{transport}','AdminController@showTransportDetail');
        Route::patch('edit/{transport}','AdminController@editTransport');
        Route::delete('/{transport}','AdminController@deleteTransport');
    });
    Route::group(['prefix' => 'playground'], function() {
        Route::get('','AdminController@showPlayground');
        Route::get('detail/{post}','AdminController@showPlaygroundDetail');
        Route::delete('/{post}','AdminController@deletePlayground');
    });
    Route::group(['prefix' => 'found'], function() {
        Route::get('','AdminController@showFound');
        Route::get('edit/{found}','AdminController@showEditFound');
        Route::get('detail/{found}','AdminController@showFoundDetail');
        Route::patch('edit/{found}','AdminController@editFound');
        Route::delete('/{found}','AdminController@deleteFound');
    });
    Route::group(['prefix' => 'lost'], function () {
        Route::get('','AdminController@showLost');
        Route::get('edit/{lost}','AdminController@showEditLost');
        Route::get('detail/{lost}','AdminController@showLostDetail');
        Route::patch('edit/{lost}','AdminController@editLost');
        Route::delete('/{lost}','AdminController@deleteLost');
    });
    Route::group(['prefix' => 'feedback'], function () {
        Route::get('','AdminController@showFeedback');
        Route::get('detail/{feedback}','AdminController@showFeedbackDetail');
        Route::delete('/{feedback}','AdminController@deleteFeedback');
    });
});


