<?php

declare(strict_types=1);

namespace BeastBytes\Mermaid;

/**
 * Attaches a style class to an item
 */
trait StyleClassTrait
{
    private ?string $styleClass = null;

    public function withStyleClass(string $styleClass): self
    {
        $new = clone $this;
        $new->styleClass = $styleClass;
        return $new;
    }

    private function getStyleClass(): string
    {
        return is_string($this->styleClass) ? Mermaid::CLASS_OPERATOR . $this->styleClass : '';
    }
}