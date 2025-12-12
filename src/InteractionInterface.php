<?php
/**
 * @copyright Copyright © 2024 BeastBytes - All rights reserved
 * @license BSD 3-Clause
 */

declare(strict_types=1);

namespace BeastBytes\Mermaid;

interface InteractionInterface
{
    public function renderInteraction(): ?string;
    public function withInteraction(
        string $interaction,
        InteractionType $type,
        string $tooltip = '',
        InteractionTarget $target = InteractionTarget::Self
    ): self;
}