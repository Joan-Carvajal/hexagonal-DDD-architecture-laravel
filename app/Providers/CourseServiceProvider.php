<?php

namespace App\Providers;

use Core\BoundedContext\Course\Domain\CourseRepository;
use Core\BoundedContext\Course\Infrastructure\Persistence\Eloquent\CourseRepository as EloquentCourseRepository;
use Illuminate\Support\ServiceProvider;

class CourseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            CourseRepository::class,
            EloquentCourseRepository::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
