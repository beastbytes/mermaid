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
    private InteractionTarget $target;
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
                . ($this->tooltip === '' ? '' : ' "' . $this->tooltip . '"')
                . ($this->type === InteractionType::Link ? ' ' . $this->target->value : '')
            ;
        }
    }

    public function withInteraction(
        string $interaction,
        InteractionType $type,
        string $tooltip = '',
        InteractionTarget $target = InteractionTarget::Self,
    ): self
    {
        $new = clone $this;

        $new->interaction = $interaction;
        $new->target = $target;
        $new->tooltip = $tooltip;
        $new->type = $type;

        return $new;
    }
}
