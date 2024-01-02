<?php
/**
 * @copyright Copyright © 2024 BeastBytes - All rights reserved
 * @license BSD 3-Clause
 */

declare(strict_types=1);

namespace BeastBytes\Mermaid;

trait TitleTrait
{
    private readonly string $title;

    private function getTitle(): string
    {
        return implode("\n", ['---', 'title: ' . $this->title, '---']);
    }
}
