<?php
/**
 * @copyright Copyright © 2024 BeastBytes - All rights reserved
 * @license BSD 3-Clause
 */

declare(strict_types=1);

namespace BeastBytes\Mermaid;

trait RenderItemsTrait
{
    private function renderItems(array $items, string $indentation): string
    {
        $output = [];

        foreach ($items as $item) {
            $output[] = $item->render($indentation);
        }

        return implode("\n", $output);
    }
}
