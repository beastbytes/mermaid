<?php

declare(strict_types=1);

namespace BeastBytes\Mermaid;

trait InteractionRendererTrait
{
    private function renderInteractions(array $objects): string
    {
        $output = [];

        foreach ($objects as $object) {
            $interaction = $object->renderInteraction();

            if (is_string($interaction)) {
                $output[] = $interaction;
            }
        }

        return implode("\n", $output);
    }
}