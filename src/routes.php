<?php


Route::group(['middleware' => ['web', 'dev']], function () {
    Route::get('/pages/create', '\Kirschbaum\LaravelSparkPages\PageController@create');
    Route::post('/pages', '\Kirschbaum\LaravelSparkPages\PageController@store');
    Route::put('/pages/{slug}', '\Kirschbaum\LaravelSparkPages\PageController@update');
    Route::delete('/pages/{slug}', '\Kirschbaum\LaravelSparkPages\PageController@destroy');
    Route::get('/pages/{slug}/edit', '\Kirschbaum\LaravelSparkPages\PageController@edit');
});

/*
 * The below route must be placed at the bottom of this file:
 * or else the /{slug} route will match every route above and get called 100% of the time.
 */
Route::get('/pages/{slug}', '\Kirschbaum\LaravelSparkPages\PageController@show');