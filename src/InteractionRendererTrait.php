<?php
/**
 * @copyright Copyright © 2024 BeastBytes - All rights reserved
 * @license BSD 3-Clause
 */

declare(strict_types=1);

namespace BeastBytes\Mermaid;

trait InteractionRendererTrait
{
    private array $interactions = [];

    private function getInteraction(InteractionInterface $object): void
    {
        if ($object->hasInteraction()) {
            $this->interactions[] = $object->getInteraction();
        }
    }

    private function renderInteractions(): string
    {
        $output = [];

        foreach ($this->interactions as $interaction) {
            $output[] = Mermaid::INDENTATION . $interaction;
        }

        return implode("\n", $output);
    }
}
