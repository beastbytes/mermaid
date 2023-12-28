<?php
/**
 * @copyright Copyright © 2023 BeastBytes - All rights reserved
 * @license BSD 3-Clause
 */

declare(strict_types=1);

namespace BeastBytes\Mermaid;

trait TextTrait
{
    private function getText(?string $text, bool $isMarkdown): string
    {
        if ($text === null) {
            return '';
        }

        if ($isMarkdown) {
            $text = '`' . $text . '`';
        }

        return '"' . $text . '"';
    }
}
