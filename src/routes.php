<?php

Route::group(['middleware' => ['web', 'dev']], function () {
    Route::get('/pages/create', '\Kirschbaum\LaravelSparkPages\PageController@create');
    Route::post('/pages', '\Kirschbaum\LaravelSparkPages\PageController@store');
    Route::put('/pages/{slug}', '\Kirschbaum\LaravelSparkPages\PageController@update');
    Route::delete('/pages/{slug}', '\Kirschbaum\LaravelSparkPages\PageController@destroy');
    Route::get('/pages/{slug}/edit', '\Kirschbaum\LaravelSparkPages\PageController@edit');
});

