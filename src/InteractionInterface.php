<?php

declare(strict_types=1);

namespace BeastBytes\Mermaid;

interface InteractionInterface
{
    public function renderInteraction(): ?string;
    public function withInteraction(
        string $interaction,
        InteractionType $type,
        ?string $tooltip = null,
        InteractionTarget $target = InteractionTarget::self
    ): self;
}