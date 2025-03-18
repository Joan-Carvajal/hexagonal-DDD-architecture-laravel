<?php


namespace Core\BoundedContext\Course\Application\Actions;

use Core\BoundedContext\Course\Application\Responses\CoursesResponse;
use Core\BoundedContext\Course\Domain\CourseRepository;

class ListCourses{

    public function __construct(private CourseRepository $repository){}


    public function __invoke(): CoursesResponse{
        $courses = $this->repository->list();
         return CoursesResponse::fromCourses($courses);
    }
}
