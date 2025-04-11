<?php

namespace App\Providers;

use Core\Shared\Domain\UuidGenerator;
use Core\Shared\Infrastructure\RamseyUuidGenerator;
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
        $this->app->bind(
            UuidGenerator::class,
            RamseyUuidGenerator::class
        );
        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->loadMigrationsFrom(
            File::allFiles(base_path("src/BoundedContext/**/Infrastructure/migrations"))
        );

        $this->loadSeedersFrom(base_path("src/BoundedContext/**/Infrastructure/seeders"));
        Factory::guessFactoryNamesUsing(function (string $modelName) {
            return str_replace(
                'Core\\BoundedContext\\**\\Infrastructure\\Persistence\\Eloquent',
                'Core\\BoundedContext\\**\\Infrastructure\\factories',
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
