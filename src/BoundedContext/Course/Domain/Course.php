<?php

namespace Core\BoundedContext\Course\Domain;

use Core\BoundedContext\Course\Domain\ValueObject\{
    CourseId,
    CourseName,
};

class Course  {
    public function __construct(private CourseId $id, private CourseName $name){}


    public static function fromPrimitives(string $id, string $name):self
    {
        return new self(
            new CourseId($id),
            new CourseName($name)
        );
    }

    public static function create(CourseId $id, CourseName $name):self{
        return new self($id,$name);
    }

    public function id(): CourseId
    {
        return $this->id;
    }

    public function name(): CourseName
    {
        return $this->name;
    }
    
}
