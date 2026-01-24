<?php

namespace App\Providers;

use Illuminate\Support\Facades\Vite;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Cache;

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
        // 1. Registramos el Alias "Vitx"
        $loader = AliasLoader::getInstance();
        $loader->alias('Vitx', \App\Providers\VitxHelper::class);

        // 2. Lógica para la Versión Automática
        // Usamos cache para no pegarle al sistema operativo en cada request
        $appVersion = Cache::remember('app_version_tag', 3600, function () {
            // Ejecuta git describe. Si falla (ej. en hosting sin git), devuelve v1.0.0
            $version = @shell_exec('git describe --tags --always');
            return $version ? trim($version) : 'v1.0.0';
        });

        // Compartimos la variable con todas las vistas de Blade
        view()->share('appVersion', $appVersion);
    }
}

/**
 * Helper personalizado para assets
 */
class VitxHelper
{
    public static function asset($path)
    {
        return asset($path);
    }
}
