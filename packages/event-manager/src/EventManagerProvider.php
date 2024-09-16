<?php 

namespace Mkhodroo\EventManager;

use Illuminate\Support\ServiceProvider;

class EventManagerProvider extends ServiceProvider
{
    public function register() {
        
    }

    public function boot() {
        $this->loadMigrationsFrom(__DIR__ . "/Migrations");
        $this->loadRoutesFrom(__DIR__. '/routes.php');;
        $this->loadViewsFrom(__DIR__. '/Views', 'EMView');
        $this->loadJsonTranslationsFrom(__DIR__.'/Lang');
    }
}