<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    public const HOME = '/home';
    public function boot()
    {
        $this->configureRateLimiting();

        // $this->routes(function () {
        //     Route::middleware('api')
        //         ->prefix('api')
        //         ->group(base_path('routes/api.php'));

        //         Route::middleware('web')
        //         ->group(base_path('routes/web.php'));

        //     foreach (File::allFiles(base_path("src/BoundedContext/**/Infrastructure/routes")) as $routeFile) {
        //         $type = explode(".", $routeFile->getBasename())[0];
        //         Route::prefix($type)
        //             ->middleware($type)
        //             ->group($routeFile->getRealPath());
        //     }
        // });
        
    }
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
