<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::prefix('cars')->group(function() {
    Route::get('/', 'CarsController@index')->name('cars');
    Route::get('/model/{name}', 'CarsController@getModels')->name('models');
    Route::get('/model/{model}/{title}', 'CarsController@getModelType')->name('model.type');
    Route::post('/json-models', 'CarsController@getJsonModelTypes');
});

Route::prefix('announce')->group(function() {
    Route::get('/', 'AnnouncementController@index')->name('announce');
    Route::get('/flash', 'AnnouncementController@flash')->name('flash');
    Route::post('/flash-post', 'AnnouncementController@flash');
    Route::post('/send-announce', 'AnnouncementController@sendAnnounce');
    Route::get('/sends', 'AnnouncementController@Send')->name('send');
    Route::get('/incoming', 'AnnouncementController@incomingAnnounce')->name('incoming');
});

Route::prefix('buyer')->middleware('auth')->group(function(){
    Route::get('/profile/{id}', 'BuyerController@profile')->name('buyer.profile');
});

Route::prefix('seller')->middleware('auth')->group(function(){
    Route::get('/', 'SellerController@index')->name('seller.index');
    Route::get('/profile/{id}', 'SellerController@profile')->name('seller.profile');
    Route::post('/get-whos', 'SellerController@getWhos')->name('seller.getwhos');
});

