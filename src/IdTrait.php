<?php

declare(strict_types=1);

namespace BeastBytes\Mermaid;

trait IdTrait
{
    private ?string $id = null;

    public function getId(): string
    {
        if (is_null($this->id)) {
            $this->id = Mermaid::getId();
        }

        return $this->id;
    }
}