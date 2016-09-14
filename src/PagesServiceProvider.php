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
        $this->publishViews();

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
        $this->registerViewFiles();
    }

    private function publishViews()
    {
        $this->publishes([
            __DIR__.'/../views/' => base_path('resources/views/vendor/laravel-spark-pages')
        ], 'views');
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
}
