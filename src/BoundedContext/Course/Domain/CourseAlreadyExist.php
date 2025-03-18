<?php


namespace Core\BoundedContext\Course\Domain;

use Core\Shared\Domain\DomainException;
use Throwable;

final class CourseAlreadyExist extends DomainException{

    public function __construct($message = "", $code = 0, Throwable $previus= null)
    {
        $message = "" === $message ? "Course already exist" : $message;

        parent::__construct($message, $code, $previus);
    }
}
