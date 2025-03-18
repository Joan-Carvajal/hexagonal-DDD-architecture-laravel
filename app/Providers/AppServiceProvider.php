<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;
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
        $this->loadMigrationsFrom(
            File::allFiles(base_path("src/BoundedContext/**/InfrastructureLayer/migrations"))
        );

        $this->loadSeedersFrom(base_path("src/BoundedContext/**/InfrastructureLayer/seeders"));
        Factory::guessFactoryNamesUsing(function (string $modelName) {
            return str_replace(
                'Core\\BoundedContext\\**\\InfrastructureLayer\\Persistence\\Eloquent',
                'Core\\BoundedContext\\**\\InfrastructureLayer\\factories',
                $modelName
            ) . 'Factory';
        });

    }
    protected function loadSeedersFrom(string $path): void
    {
        $seedersPath = File::allFiles($path);
        foreach ($seedersPath as $seeder) {
            if ($seeder->isFile()) {
                require_once $seeder->getRealPath();
            }
        }
    }
}
