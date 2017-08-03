# Laravel Spark Pages
  
  * [Compatibility](#compatibility)
  * [Overview](#overview)
  * [Features](#features)
  * [Installation](#installing)
  * [Adding an "Add Page" Dropdown Menu Link](#dropdown)
  * [Editing the Sidebar](#sidebar)
  * [Editing Pages](#editing)
  * [Road Map](#roadmap)

<a name=compatibility></a>
## Compatibility

 Laravel Spark  | Laravel Spark Pages | Laravel |
:---------------|:--------------------|:--------|
 0.4.x          | 0.3.x               | 5.4.*   |
 0.3.x          | 0.3.x               | 5.4.*   |
 0.2.x          | 0.2.x               | 5.3.*   |
 0.1.x          | 0.1.x               | 5.2.*   |

<a name=overview></a>
## Overview

This package adds a simple CMS-like page system to [Laravel Spark](https://spark.laravel.com/ "Laravel Spark"). It allows developers and non-technical users to add and edit pages (articles, blog posts, FAQ's etc.) very quickly and without the need for a deployment.

![Alt text](https://www.dropbox.com/s/5z0xr3hotkd9xt5/laravel-spark-pages.png?raw=1)

We have purposely chosen not to overcomplicate this add-on. If your product is successful and you end up needing more bells and whistles you may want to look into building your own solution. This is meant as a minimally viable solution that can be used until the product is worth investing more resources into.

**Note that this package is under active development.** Feel free to open an issue and/or submit a pull request if you see anything amiss.

<a name=features></a>
## Features

* The ability to add/edit/delete pages is restricted to users with email addresses in the spark developers array.
* Provides simple [Summernote WYSIWYG editor](http://summernote.org/ "Summernote WYSIWYG editor").
* Provides a simple editable sidebar.
* A user with appropriate permissions will see a `create` button in the dropdown options list. If the user is on a page that can be edited, an `edit` link will be visible.
* Only pages that a marked `published` will be visible to non-developers.
* Ability to delete pages (note that this is a hard delete).
* All views can be customized by editing the view file found in `resources/views/vendor/laravel-spark-pages/`.
* Supports nested folder structure slugs (e.g. /blog/my-awesome-post)

<a name=installing></a>
## Basic Installation

Add the package to your existing Spark installation:

```
composer require kirschbaum/laravel-spark-pages
```

Add the following to the `providers` array in `config/app.php`. This provider must be **registered as the last service provider** on the `providers` array:

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

Compile your assets:

```
npm run dev
```

<a name=dropdown></a>
## Adding an "Add Page" Dropdown Menu Link

If you'd like to add a link in your developer's dropdown menu, you can do that by adding the below "Add Page" link to your
`resources/views/vendor/spark/nav/developer.blade.php` file:

```html
<!-- Kiosk -->
<li>
    <a href="/spark/kiosk">
        <i class="fa fa-fw fa-btn fa-fort-awesome"></i>Kiosk
    </a>
    <a href="/pages/create">
        <i class="fa fa-fw fa-btn fa-plus"></i>Add Page
    </a>
</li>
```
![Alt text](https://www.dropbox.com/s/hhlf8bsnld1t2xl/Screenshot%202016-09-18%2013.00.59.png?raw=1)

<a name=sidebar></a>
## Editing the Sidebar

The template for the sidebar is located at `resources/views/vendor/laravel-spark-pages/sidebar.blade.php`. Modify this file to your heart's content. 

<a name=editing></a>
## Editing Pages

Navigate to the page you want to edit. If the user you are logged in as has their email address in the Spark developers array then you will see an admin section in the sidebar with the link "Edit this page".

![Alt text](https://www.dropbox.com/s/g6cgmvl5u6ulxkw/Screenshot%202016-09-18%2013.04.27.png?raw=1)

<a name=roadmap></a>
## Roadmap
* Build in SEO tools.
* List view for pages.
* Ability to have multipe types of sidebars and select which to use on a page-by-page basis.
