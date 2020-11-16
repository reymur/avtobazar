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
    Route::get('/send-flash', 'AnnouncementController@flash')->name('flash');
    Route::get('/send-to/{who}/{pin}', 'AnnouncementController@SendTo')->name('send_to_post');

    /* Used AnswerController */
    Route::get('/answers', 'AnswerController@answersAnnounce')->name('answers');
    Route::post('/answers-post', 'AnswerController@answersAnnouncePostVue')->name('answers_post');
    Route::post('/answers-create', 'AnswerController@answersAnnounceCreate')->name('answers_create');
    Route::post('/get-show-all-answer-vue', 'AnswerController@getShowAllAnswerVue')->name('get_show_all_answer_vue');
    Route::post('/answer-seen-update-vue', 'AnswerController@answerSeenUpdate')->name('answer_seen_update_vue');
    Route::post('/side-bar-answers-vue', 'AnswerController@getUserLeftBarAnswer')->name('side_bar_answers_vue');
    Route::post('/main-menu-answers-count', 'AnswerController@getUserLeftBarAnswer')->name('main_menu_answers_count');
    Route::post('/answers-details-vue', 'AnswerController@getAnswersDetailsVue')->name('answers_details_vue');

    Route::get('/orders', 'AnnouncementController@ordersAnnounce')->name('orders');
    Route::get('/orders-delete/{id}', 'AnnouncementController@orderAnnounceDelete')->name('order_delete');
    Route::get('/buyer-announce-delete/{id}', 'AnnouncementController@buyerAnnounceADelete')->name('buyer_announce_delete');
});

Route::prefix('buyer')->middleware('auth')->group(function(){
    Route::get('/profile/{id}', 'BuyerController@profile')->name('buyer.profile');
});

Route::prefix('seller')->middleware('auth')->group(function(){
    Route::get('/', 'SellerController@index')->name('seller.index');
    Route::get('/profile/{id}', 'SellerController@profile')->name('seller.profile');
    Route::post('/get-whos', 'SellerController@getWhos')->name('seller.getwhos');
});

Route::post('/get-conditions', 'ConditionController@getConditions');

//Route::post('/get-fuel-type', 'AnswerController@getFuelType');

