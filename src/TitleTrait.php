<?php
/**
 * @copyright Copyright © 2024 BeastBytes - All rights reserved
 * @license BSD 3-Clause
 */

declare(strict_types=1);

namespace BeastBytes\Mermaid;

trait TitleTrait
{
    private string $title = '';

    public function withTitle(string $title): self
    {
        $new = clone $this;
        $new->title = $title;
        return $new;
    }

    private function renderTitle(array &$output): void
    {
        if ($this->title !== '') {
            $output[] = '---';
            $output[] = 'title: ' . $this->title;
            $output[] = '---';
        }
    }
}
