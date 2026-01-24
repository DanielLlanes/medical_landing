<?php

namespace App\Providers;

use Illuminate\Support\Facades\Vite;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
       // Registramos el Alias "Vitx" para que Laravel lo reconozca en los Blades
        $loader = AliasLoader::getInstance();
        $loader->alias('Vitx', \App\Providers\VitxHelper::class);
    }
}

class VitxHelper 
{
    public static function asset($path) 
    {
        return asset($path);
    }
}