<?php

namespace Pvtl\VoyagerPageBlocks;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class PageBlocksServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services
     *
     * @param Router $router
     *
     * @return void
     */
    public function boot(Router $router)
    {
        $this->loadRoutesFrom(base_path('/routes/web.php'));
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        // Defines which files to copy the root project
        $this->publishes([
            __DIR__ . '/../config' => base_path('config'),
            __DIR__ . '/../database/migrations' => base_path('database/migrations'),
            __DIR__ . '/../database/seeds' => base_path('database/seeds'),
        ]);

        // Load views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'voyager-page-blocks');
        $this->loadViewsFrom(__DIR__.'/../resources/views/vendor/voyager', 'voyager');

        // Locate our factories for testing
        $this->app->make('Illuminate\Database\Eloquent\Factory')->load(
            __DIR__ . '/../database/factories'
        );

        if ($this->app->runningInConsole()) {
            $this->commands([
                commands\InstallCommand::class
            ]);
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

    }
}