# Laravel Spark Pages

**Note that this package is under active development.** We expect to have a stable version in the next week or two. In the meantime, use caution and feel free to submit a pull request if you see anything amiss.

## Overview

This package adds a simple CMS-like page system to [Laravel Spark](https://spark.laravel.com/ "Laravel Spark"). It allows developers and non-technical users to add and edit pages (articles, blog posts, FAQ's etc.) very quickly and without the need for a deployment.

We have purposely chosen not to overcomplicate this add-on. If your product is successful and you end up needing more bells and whissles you may want to look into building your own solution. This is meant as a minimally viable solution that can be used until the product is worth investing more resources into. At that point you will probably want to build your own CMS-like functionality.

## Installation

Add the package to your existing Spark installation:

```
composer require kirschbaum\laravel-spark-pages
```

Add the following to the `providers` array in `config/app.php`:

```
Kirschbaum\LaravelSparkPages\PagesServiceProvider::class
```

Publish migrations:

```
php artisan vendor:publish --provider="Kirschbaum\LaravelSparkPages\PagesServiceProvider" --tag='migrations'
```

Run migrations:

```
php artisan migrate
```

Publish assets:

```
php artisan vendor:publish --provider="Kirschbaum\LaravelSparkPages\PagesServiceProvider" --tag='assets'
```

Add the following line to `resources/assets/js/app.js`:

```
require('./laravel-spark-pages-components/delete-button');
```

Run gulp:

```
gulp
```

Finally, add the following route to your routes.php file.  This route MUST be place at the VERY BOTTOM of the file or else it will match every request and cause problems.

~~~
Route::get('/{slug}', '\Kirschbaum\LaravelSparkPages\PageController@show');
~~~

## Features

* The ability to add/edit/delete pages is restricted to users with email addresses in the spark developers array.
* Provides simple Summernote WYSIWYG editor.
* Provides a simple editable sidebar.
* A user with appropriate permissions will see a `create` button in the dropdown options list. If the user is on a page that can be edited, an `edit` link will be visible.
* Only pages that a marked `published` will be visible to non-developers.
* Ability to delete pages (note that this is a hard delete).
* All views can be customized by editing the view file found in `resources/views/vendor/laravel-spark-pages/`.

## Roadmap
* Confirm this works with Spark 2.0
* Support nested folder structure slugs (e.g. /blog/my-awesome-post)
* Build in SEO tools.
* List view for pages.
* Ability to have multipe types of sidebars and select which to use on a page-by-page basis.
