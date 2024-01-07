<?php
/**
 * @copyright Copyright © 2023 BeastBytes - All rights reserved
 * @license BSD 3-Clause
 */

declare(strict_types=1);

namespace BeastBytes\Mermaid;

/**
 * Returns text formatted as plain text or Markdown
 */
trait TextTrait
{
    private string $text;
    private readonly bool $isMarkdown;

    private function getText(string $prepend = '', string $append = '', ): string
    {
        if ($this->text === '') {
            return '';
        }

        return $prepend . '"' . ($this->isMarkdown ? '`' . $this->text . '`' : $this->text) . '"' . $append;
    }
}
