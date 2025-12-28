<?php

declare(strict_types=1);

namespace BeastBytes\Mermaid;

trait TitleTrait
{
    public const bool QUOTE = true;
    private const string TITLE = 'title %s%s%1$s';

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
            ? $indentation . sprintf(self::TITLE, ($quote ? '"' : ''), $this->title)
            : ''
        ;
    }
}