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
        $this->registerRoutes();
        $this->publishMigrations();
        $this->publishAssets();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Kirschbaum\LaravelSparkPages\PageController');
        $this->app->make('Kirschbaum\LaravelSparkPages\Page');
        $this->registerViewFiles();
    }


    private function publishMigrations()
    {
        $this->publishes([
            __DIR__.'/../database/migrations/' => database_path('migrations')
        ], 'migrations');
    }

    private function registerRoutes()
    {
        if (! $this->app->routesAreCached()) {
            require __DIR__ . '/routes.php';
        }
    }

    private function registerViewFiles()
    {
        $this->loadViewsFrom(__DIR__.'/../views', 'laravel-spark-pages');
    }

    private function publishAssets()
    {
        $this->publishes([
            __DIR__.'/../views/' => base_path('resources/views/vendor/laravel-spark-pages'),
            __DIR__.'/../js/' => base_path('resources/assets/js/laravel-spark-pages-components')
        ], 'assets');
    }

}
