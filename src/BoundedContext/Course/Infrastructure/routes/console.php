<?php

use Core\BoundedContext\Course\Application\Actions\ListCourses;
use Core\BoundedContext\Course\Infrastructure\Persistence\Eloquent\CourseRepository;
use Illuminate\Support\Facades\Artisan;

Artisan::command("ah:list-courses", function(CourseRepository $repository){
    $coursesResponse= (new ListCourses($repository))();

    $headers=["ID","Course"];


    $this->table($headers, $coursesResponse->toArray());
});