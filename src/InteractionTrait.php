<?php
/**
 * @copyright Copyright © 2024 BeastBytes - All rights reserved
 * @license BSD 3-Clause
 */

declare(strict_types=1);

namespace BeastBytes\Mermaid;

trait InteractionTrait
{
    private string $interaction = '';

    abstract public function getName(): string;

    /** @internal */
    public function getInteraction(): string
    {
        return $this->interaction;
    }

    /** @internal */
    public function hasInteraction(): bool
    {
        return $this->interaction !== '';
    }

    public function withInteraction(
        string $interaction,
        InteractionType $type = InteractionType::Link,
        string $tooltip = ''
    ): self
    {
        $new = clone $this;
        $new->interaction = 'click '
            . $this->getName()
            . ' '
            . $type->value
            . ' '
            . ($type === InteractionType::Callback ? $interaction : '"' . $interaction . '"')
            . ($tooltip === '' ? '' : ' "' . $tooltip . '"');
        return $new;
    }
}
