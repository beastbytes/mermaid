<?php

declare(strict_types=1);

namespace BeastBytes\Mermaid;

trait NodeTrait
{
    private readonly string $id;

    public function getId(): string
    {
        return '_' . $this->id;
    }
}