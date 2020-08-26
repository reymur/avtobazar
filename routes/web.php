<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::prefix('cars')->group(function() {
    Route::get('/', 'CarsController@index')->name('cars');
    Route::get('/model/{name}', 'CarsController@getModel')->name('model');
    Route::get('/model/{model}/{name}', 'CarsController@getModelTypes')->name('type');
    Route::post('/json-models', 'CarsController@getJsonModelTypes');
    Route::post('/send-info', 'CarsController@sendInfo');
});

Route::prefix('announce')->group(function() {
    Route::get('/', 'AnnouncementController@index')->name('announce');
    Route::get('/flash', 'AnnouncementController@flash')->name('flash');
    Route::post('/flash-post', 'AnnouncementController@flash');
    Route::get('/sends', 'AnnouncementController@sendAnnounce')->name('send');
    Route::get('/incoming', 'AnnouncementController@incomingAnnounce')->name('incoming');
});

Route::prefix('seller')->middleware('auth')->group(function(){
    Route::get('/', 'SellerController@index')->name('seller.index');
    Route::get('/profile/{id}', 'SellerController@profile')->name('seller.profile');
});
