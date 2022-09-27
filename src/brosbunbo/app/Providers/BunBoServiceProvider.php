<?php namespace BunBo\Providers;

use Illuminate\Support\ServiceProvider;

class BunBoServiceProvider extends ServiceProvider {

    public function boot()
    {
        $root = __DIR__ . '/../..';

        // Load admin routes
        include $root . '/routes.php';

        // Load views
        $this->loadViewsFrom($root . '/resources/views', 'bunbo');

        /**
         * Publish:
         * 1. Views
         * 2. Assets
         * 3. Migrations
         * 4. Seed
         * 5. Config
         */
        $this->publishes([
            $root . '/resources/views'      => base_path() . '/resources/views/bunbo',
            $root . '/resources/assets'     => public_path() . '/packages/bunbo/',
            $root . '/database/migrations'  => base_path() . '/database/migrations',
            $root . '/database/seeds'       => base_path() . '/database/seeds',
            $root . '/config/bunbo.php'     => base_path() . '/config/bunbo.php'
        ]);
    }

    public function register()
    {
        // Merge config
        $this->mergeConfigFrom(__DIR__ . '/../../config/bunbo.php', 'bunbo');
    }

}
