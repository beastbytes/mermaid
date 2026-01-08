<?php

declare(strict_types=1);

namespace BeastBytes\Mermaid;

interface InteractionInterface
{
    public function renderInteraction(): ?string;
    public function withInteraction(
        string $interaction,
        InteractionType $interactionType,
        ?string $tooltip = null,
        InteractionTarget $interactionTarget = InteractionTarget::self
    ): self;
}