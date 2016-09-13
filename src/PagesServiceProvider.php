<?php

namespace Kirschbaum\LaravelSparkPages;

use Illuminate\Support\ServiceProvider;

class PagesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/views', 'pages');
        $this->publishes([
            __DIR__.'/views' => base_path('resources/views/kirschbaum/laravel-spark-pages/'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        include __DIR__.'/routes.php';
        $this->app->make('Kirschbaum\LaravelSparkPages\PageController');
    }
}
