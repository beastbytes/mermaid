<?php
/**
 * @copyright Copyright © 2023 BeastBytes - All rights reserved
 * @license BSD 3-Clause
 */

declare(strict_types=1);

namespace BeastBytes\Mermaid;

trait NodeTrait
{
    private readonly string $id;

    public function getId(): string
    {
        return '_' . $this->id;
    }

    abstract public function getStyleClass(): string;
}
