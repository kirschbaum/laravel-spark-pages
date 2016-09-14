# Laravel Spark Pages

## Overview

This package allows for the easy adding and editing of pages to your Laravel Spark app.

Non-programmers can easily build and maintain these pages, as they work like an extremely easy content management system.

This can be useful for pages such as "About", "Contact", "Terms of Service" and "Privacy Policy" styled-pages.

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

Then run migration to setup the pages table:

~~~
php artisan migrate
~~~

Publish the assets:

~~~
php artisan vendor:publish --provider="Kirschbaum\LaravelSparkPages\PagesServiceProvider" --tag='assets'
~~~

Add the following line to `resources/assets/js/app.js`

~~~
require('./laravel-spark-pages-components/delete-button');
~~~

Make sure to run `gulp`!

## Features

Create new pages for your Laravel Spark application by navigating to `/pages/create`.

After creating a new page, you can navigate to that page by using the slug you entered when creating the page,
and navigating to `/{slug}`.

To edit the page you created, navigate to the page and click on the "edit" button, or alternatively you can
navigate to `/pages/{slug}/edit`.

You can delete pages by navigating to the edit page, where you will see a "delete" button.

If you want to customize the views, feel free to do so in the following folder:  `resources/views/vendor/laravel-spark-pages/`,
 which should allow you to update this package without overwriting your customized views.