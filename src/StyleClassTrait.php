<?php
/**
 * @copyright Copyright © 2023 BeastBytes - All rights reserved
 * @license BSD 3-Clause
 */

declare(strict_types=1);

namespace BeastBytes\Mermaid;

/**
 * Attaches a style class to an item
 */
trait StyleClassTrait
{
    private readonly string $styleClass;

    private function getStyleClass(): string
    {
        return $this->styleClass === '' ? '' : Mermaid::CLASS_OPERATOR . $this->styleClass;
    }
}
