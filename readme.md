# Laravel Spark Pages

## Overview

This package allows for the easy adding and editing of pages to your Laravel Spark app.

Non-programmers can easily build and maintenance of these pages, as they work like a basic content management system.

This can be useful for pages similar to standard "About", "Contact", "Terms of Service" and "Privacy Policy" styles.

## Installation

Add the package by typing `composer require LaravelSparkPages`

The below route must be placed at the VERY BOTTOM of your routes.php file,
or else the /{slug} route will match every route above and get called 100% of the time.

~~~
Route::get('/{slug}', '\Kirschbaum\LaravelSparkPages\PageController@show');
~~~

Add `Kirschbaum\LaravelSparkPages\PagesServiceProvider::class` to the `providers` array in config/app.php.

Publish the package migrations:

~~~
php artisan vendor:publish --provider="Kirschbaum\LaravelSparkPages\PagesServiceProvider" --tag='migrations'
~~~

Then run migration to setup the base table:

~~~
php artisan migrate
~~~
