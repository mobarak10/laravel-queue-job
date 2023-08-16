<?php

namespace App\Providers;

use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;

class ViteServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // conditional add attribute in assets
        Vite::useScriptTagAttributes(function (string $src, string $url, array|null $chunk, array|null $manifest) {

            if ($src === 'resources/js/app.js') {
                return [
                    'type' => 'module',
                    'defer' => true
                ];
            }

            return [];
        });
    }
}
