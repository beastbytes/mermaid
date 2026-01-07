<?php

declare(strict_types=1);

namespace BeastBytes\Mermaid;

trait InteractionTrait
{
    private ?string $interaction = null;
    private ?string $tooltip = null;
    private InteractionTarget $target;
    private InteractionType $type;

    abstract public function getId(): string;

    /** @internal */
    public function renderInteraction(): ?string
    {
        return is_string($this->interaction)
            ? Mermaid::INDENTATION . 'click '
                . $this->getId()
                . ' '
                . $this->type->value
                . ' '
                . ($this->type === InteractionType::callback ? $this->interaction : '"' . $this->interaction . '"')
                . (is_string($this->tooltip) ? ' "' . $this->tooltip . '"' : '')
                . ($this->type === InteractionType::link ? ' ' . $this->target->value : '')
            : null
        ;
    }

    public function withInteraction(
        string $interaction,
        InteractionType $type,
        ?string $tooltip = null,
        InteractionTarget $target = InteractionTarget::self,
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