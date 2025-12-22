<?php

declare(strict_types=1);

namespace BeastBytes\Mermaid;

trait IconTrait
{
    private const string ICON = '::icon(%s)';

    private ?string $icon = null;

    public function withIcon(string $icon): self
    {
        $new = clone $this;
        $new->icon = $icon;
        return $new;
    }

    private function renderIcon(): string
    {
        return is_string($this->icon) ? sprintf(self::ICON, $this->icon) : '';
    }
}