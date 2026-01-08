<?php

declare(strict_types=1);

namespace BeastBytes\Mermaid;

trait InteractionTrait
{
    private ?string $interaction = null;
    private ?string $tooltip = null;
    private InteractionTarget $interactionTarget;
    private InteractionType $interactionType;

    abstract public function getId(): string;

    /** @internal */
    public function renderInteraction(): ?string
    {
        return is_string($this->interaction)
            ? Mermaid::INDENTATION . 'click '
                . $this->getId()
                . ' '
                . $this->interactionType->value
                . ' '
                . ($this->interactionType === InteractionType::callback
                    ? $this->interaction
                    : '"' . $this->interaction . '"'
                )
                . (is_string($this->tooltip) ? ' "' . $this->tooltip . '"' : '')
                . ($this->interactionType === InteractionType::link ? ' ' . $this->interactionTarget->value : '')
            : null
        ;
    }

    public function withInteraction(
        string $interaction,
        InteractionType $interactionType,
        ?string $tooltip = null,
        InteractionTarget $interactionTarget = InteractionTarget::self,
    ): self
    {
        $new = clone $this;

        $new->interaction = $interaction;
        $new->interactionTarget = $interactionTarget;
        $new->tooltip = $tooltip;
        $new->interactionType = $interactionType;

        return $new;
    }
}