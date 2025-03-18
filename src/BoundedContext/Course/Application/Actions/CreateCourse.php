<?php

namespace Core\BoundedContext\Course\Application\Actions;

use Core\BoundedContext\Course\Application\Responses\CourseResponse;
use Core\BoundedContext\Course\Domain\Course;
use Core\BoundedContext\Course\Domain\CourseAlreadyExist;
use Core\BoundedContext\Course\Domain\CourseRepository;
use Core\BoundedContext\Course\Domain\ValueObject\CourseId;
use Core\BoundedContext\Course\Domain\ValueObject\CourseName;

final class CreateCourse{
    public function __construct(private CourseRepository $repository){}

    public function __invoke(string $id, string $name): CourseResponse
    {
        $id = new CourseId($id);

        $course= $this->repository->find($id);
        if (null !== $course) {
            throw new CourseAlreadyExist();
        }

        $name = new CourseName($name);

        $course = Course::create($id,$name);
        $this->repository->save($course);

        return CourseResponse::fromCourse($course);
    }
}
