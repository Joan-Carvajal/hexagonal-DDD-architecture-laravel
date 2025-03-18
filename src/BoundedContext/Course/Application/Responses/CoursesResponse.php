<?php


namespace Core\BoundedContext\Course\Application\Responses;

use Core\BoundedContext\Course\Domain\Courses;

final class CoursesResponse{
    public function __construct(private array $courses){}


    public static function fromCourses(Courses $courses): self{
        $courseResponse= array_map(
            function ($course){
                return CourseResponse::fromCourse($course);
            },
            $courses->all()
        );
        return new self($courseResponse);
    }

    public function toArray(): array{
        return array_map(function (CourseResponse $courseResponse){
            return $courseResponse->toArray();
        },$this->courses);
    }
}
