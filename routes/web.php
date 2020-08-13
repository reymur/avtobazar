<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::prefix('cars')->group(function() {
    Route::get('/', 'CarsController@index')->name('cars');
    Route::get('/model/{name}', 'CarsController@getModel')->name('model');
    Route::get('/model/{model}/{name}', 'CarsController@getModelTypes')->name('type');
    Route::post('/json-models', 'CarsController@getJsonModelTypes');
});
