<?php

declare(strict_types=1);

namespace BeastBytes\Mermaid;

trait DirectionTrait
{
    private Direction $direction = Direction::topBottom;

    public function withDirection(Direction $direction): self
    {
        $new = clone $this;
        $new->direction = $direction;
        return $new;
    }

    private function getDirection(): string
    {
        return 'direction ' . $this->direction->name;
    }
}