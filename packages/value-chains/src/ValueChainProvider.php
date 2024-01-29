<?php 

namespace Mkhodroo\ValueChain;

use Illuminate\Support\ServiceProvider;

class ValueChainProvider extends ServiceProvider
{
    public function register() {
        
    }

    public function boot() {
        $this->loadMigrationsFrom(__DIR__ . "/Migrations");
        $this->loadRoutesFrom(__DIR__. '/routes.php');;
        $this->loadViewsFrom(__DIR__. '/Views', 'VCView');
        $this->loadJsonTranslationsFrom(__DIR__.'/Lang');
    }
}