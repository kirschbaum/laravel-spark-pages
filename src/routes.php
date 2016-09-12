<?php

Route::group(['middleware' => ['web', 'dev']], function () {
    Route::get('/pages/create', 'PageController@create');
    Route::post('/pages', 'PageController@store');
    Route::put('/pages/{slug}', 'PageController@update');
    Route::delete('/pages/{slug}', 'PageController@destroy');
    Route::get('/pages/{slug}/edit', 'PageController@edit');
});

/*
 * The below route must be placed at the bottom of this file:
 * or else the /{slug} route will match every route above and get called 100% of the time.
 */
Route::get('/{slug}', 'PageController@show');