<?php
/**
 * @copyright Copyright © 2024 BeastBytes - All rights reserved
 * @license BSD 3-Clause
 */

declare(strict_types=1);

namespace BeastBytes\Mermaid;

trait DirectionTrait
{
    private Direction $direction = Direction::TB;

    public function withDirection(Direction $direction): self
    {
        $new = clone $this;
        $new->direction = $direction;
        return $this;
    }

    private function renderDirection(string $indentation): string
    {
        return $indentation . 'direction ' . $this->direction->name;
    }
}
