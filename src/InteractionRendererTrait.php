<?php
/**
 * @copyright Copyright © 2024 BeastBytes - All rights reserved
 * @license BSD 3-Clause
 */

declare(strict_types=1);

namespace BeastBytes\Mermaid;

trait InteractionRendererTrait
{
    private function renderInteractions(array $objects): string
    {
        $output = [];

        foreach ($objects as $object) {
            $output[] = $object->renderInteraction();
        }

        return implode("\n", $output);
    }
}