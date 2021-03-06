<?php

declare(strict_types=1);

namespace EhsanMoradi\Categorizable;

use Illuminate\Support\ServiceProvider;

class CategorizableServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../database/migrations/create_categories_tables.php' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_categories_tables.php'),
        ], 'migrations');

        $this->publishes([
            __DIR__ . '/../config/categorizable.php' => config_path('categorizable.php'),
        ], 'config');
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/categorizable.php', 'categorizable');
    }
}
