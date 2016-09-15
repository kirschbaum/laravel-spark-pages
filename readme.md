# Laravel Spark Pages

## Overview

This package adds a simple CMS-like page system to [Laravel Spark](https://spark.laravel.com/ "Laravel Spark"). It allows developers and non-technical users to add and edit pages (articles, blog posts, FAQ's etc.) very quickly and without the need for a deployment.

We have purposely chosen not to overcomplicate this add-on. If your product is successful and you end up needing more bells and whissles you may want to look into building your own solution. This is meant as a minimally viable solution that can be used until the product is worth investing more resources into. At that point you will probably want to build your own CMS-like functionality.

## Installation

Add the package to your existing Spark installation:

```
composer require kirschbaum\laravel-spark-pages
```

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

Create new pages for your Laravel Spark application by navigating to `/pages/create`.  Check the "publish" checkbox
in order to make the page live on your site.

You can navigate to the pages you create and publish by using the slug you entered and browsing to `/{slug}`.

To edit the page you created, navigate to the page and click on the "edit" button, or navigate directly to `/pages/{slug}/edit`.

To take pages offline, uncheck the "publish" checkbox.

You can delete pages by navigating to the edit page, where a "delete" button is provided.  By default, these are hard deletes,
so exercise caution when deleting as you will permanently lose the content you have created for that page.  Remember, you can
simply uncheck the "publish" checkbox instead of completely deleting pages if you'd like to take them offline.

If you want to customize the views, feel free to do so in the following folder:  `resources/views/vendor/laravel-spark-pages/`.
Making updates to that directory will prevent your changes from getting overwritten if you decide to update this package.