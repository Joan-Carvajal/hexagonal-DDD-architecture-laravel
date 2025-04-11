<?php

use Core\BoundedContext\Course\Infrastructure\Controllers\{
    CreateCoursePostController,
    ListCoursesGetController,
};
use Illuminate\Support\Facades\Route;

Route::post('/courses', CreateCoursePostController::class);
Route::get('/courses', ListCoursesGetController::class);