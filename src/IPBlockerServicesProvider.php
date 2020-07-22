<?php

namespace Larasecure\IPBlocker;

use Illuminate\Support\ServiceProvider;

class IPBlockerServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishMiddleware();
        $this->publishMigrations();
        $this->publishModels();
    }


    private function publishMiddleware()
    {
        $path = $this->getMiddlwarePath();
        $this->publishes([$path => app_path('/Http/Middleware/IPBlocking.php')], 'ipblocker');
    }

    private function publishMigrations()
    {
        $path = $this->getMigrationsPath();
        $this->publishes([$path => database_path('migrations')], 'ipblocker');
    }

    private function publishModels()
    {
        $path = $this->getModelPath();
        $this->publishes([$path => app_path('IPBlocker.php')], 'ipblocker');
    }

    private function getMiddlwarePath()
    {
        return __DIR__ . '/Middlewares/IPBlocking.php';
    }

    private function getMigrationsPath()
    {
        return __DIR__ . '/Migrations/';
    }

        private function getModelPath()
    {
        return __DIR__ . '/Models/IPBlocker.php';
    }
}