<?php

declare(strict_types=1);

namespace BeastBytes\Mermaid;

trait RenderItemsTrait
{
    private function renderItems(array $items, string $indentation): string
    {
        $output = [];

        foreach ($items as $item) {
            $output[] = $item->render($indentation . Mermaid::INDENTATION);
        }

        return implode("\n", $output);
    }
}