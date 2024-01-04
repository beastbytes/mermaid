<?php
/**
 * @copyright Copyright © 2024 BeastBytes - All rights reserved
 * @license BSD 3-Clause
 */

declare(strict_types=1);

namespace BeastBytes\Mermaid;

trait DirectionTrait
{
    private readonly Direction $direction;

    private function getDirection(string $indentation): string
    {
        return $indentation . 'direction ' . $this->direction->name;
    }
}
