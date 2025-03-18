<?php

declare(strict_types=1);


namespace Core\Shared\Domain;

abstract class Collection implements CollectionInterface{

    public function __construct(private array $items= [])
    {
        $this->items= $items;
    }

    public function all(): array
    {
        return $this->items;
    }
}
