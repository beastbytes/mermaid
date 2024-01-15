<?php
/**
 * @copyright Copyright © 2024 BeastBytes - All rights reserved
 * @license BSD 3-Clause
 */

declare(strict_types=1);

namespace BeastBytes\Mermaid;

trait InteractionRendererTrait
{
    /**
     * @psalm-param list<InteractionInterface> $objects
     * @param $output
     * @return void
     */
    private function renderInteractions(array $objects, &$output): void
    {
        foreach ($objects as $object) {
            $object->renderInteraction($output);
        }
    }
}
