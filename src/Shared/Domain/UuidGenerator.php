<?php
declare(strict_types=1);
namespace Core\Shared\Domain;

interface UuidGenerator{
    public function generate(): string;
}
