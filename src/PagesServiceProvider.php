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
}
