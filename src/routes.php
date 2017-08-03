<?php

use Kirschbaum\LaravelSparkPages\Page;

Route::group(['middleware' => ['web', 'dev']], function () {
    Route::get('/pages/create', '\Kirschbaum\LaravelSparkPages\PageController@create');
    Route::post('/pages', '\Kirschbaum\LaravelSparkPages\PageController@store');
    Route::put('/pages/{slug}', '\Kirschbaum\LaravelSparkPages\PageController@update');
    Route::delete('/pages/{slug}', '\Kirschbaum\LaravelSparkPages\PageController@destroy');
    Route::get('/pages/{slug}/edit', '\Kirschbaum\LaravelSparkPages\PageController@edit');
});

Route::group(['middleware' => ['web']], function () {
    try {
        $pages = Page::select(['slug'])->get();

        foreach ($pages->pluck('slug') as $slug) {
            Route::any($slug, '\Kirschbaum\LaravelSparkPages\PageController@show');
        }
    } catch (\PDOException $exception) {
        // might be because install is not complete
    }
});
