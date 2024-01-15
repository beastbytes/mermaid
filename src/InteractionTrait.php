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
    private string $tooltip;
    private InteractionType $type;

    abstract public function getId(): string;

    /** @internal */
    public function renderInteraction(array &$output): void
    {
        if ($this->interaction !== '') {
            $output[] = Mermaid::INDENTATION . 'click '
                . $this->getId()
                . ' '
                . $this->type->value
                . ' '
                . ($this->type === InteractionType::Callback ? $this->interaction : '"' . $this->interaction . '"')
                . ($this->tooltip === '' ? '' : ' "' . $this->tooltip . '"');
        }
    }

    public function withInteraction(
        string $interaction,
        InteractionType $type = InteractionType::Link,
        string $tooltip = ''
    ): self
    {
        $new = clone $this;
        $new->interaction = $interaction;
        $new->type = $type;
        $new->tooltip = $tooltip;
        return $new;
    }
}
