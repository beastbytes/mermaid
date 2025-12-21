<?php
/**
 * @copyright Copyright © 2024 BeastBytes - All rights reserved
 * @license BSD 3-Clause
 */

declare(strict_types=1);

namespace BeastBytes\Mermaid;

/**
 * Returns text formatted as plain text or Markdown
 */
trait TextTrait
{
    private const string MARKDOWN = '`%s`';
    private const string QUOTED = '"%s"';

    private ?string $text = null;
    private bool $isMarkdown = false;

    public function withText(string $text, bool $isMarkdown = false): self
    {
        $new = clone $this;
        $new->text = $text;
        $new->isMarkdown = $isMarkdown;
        return $new;
    }

    private function getText(bool $quoted = false): string
    {
        if (is_string($this->text)) {
            $text = $this->isMarkdown
                ? sprintf(self::MARKDOWN, $this->text)
                : $this->text
            ;

            return $quoted ? sprintf(self::QUOTED, $text) : $text;
        }

        return '';
    }
}