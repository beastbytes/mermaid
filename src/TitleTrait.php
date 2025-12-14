<?php

declare(strict_types=1);

namespace BeastBytes\Mermaid;

trait TitleTrait
{
    public const bool QUOTE = true;

    private ?string $title = null;

    public function withTitle(string $title): self
    {
        $new = clone $this;
        $new->title = $title;
        return $new;
    }

    public function renderTitle(string $indentation, bool $quote = false): string
    {
        return is_string($this->title)
            ? sprintf('%stitle %s%s%2$s', $indentation, ($quote ? '"' : ''), $this->title)
            : ''
        ;
    }
}