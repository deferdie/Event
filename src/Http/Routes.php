<?php

Route::get('/events', 'EventController@index');

Route::group(['middleware' => 'auth'], function()
{
    Route::get('/backend/events/', 'EventController@indexBackend');

    Route::get('/backend/event/create', 'EventController@create');

    Route::post('/backend/event/create', 'EventController@store');

    Route::delete('/backend/event/remove/{id}', 'EventController@delete');

    Route::get('/backend/event/edit/{id}', 'EventController@edit');

    Route::post('/backend/event/patch/{id}', 'EventController@save');
});