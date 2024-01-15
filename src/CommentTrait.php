<?php
/**
 * @copyright Copyright © 2024 BeastBytes - All rights reserved
 * @license BSD 3-Clause
 */

declare(strict_types=1);

namespace BeastBytes\Mermaid;

use phpDocumentor\Reflection\Types\Self_;

trait CommentTrait
{
    private string $comment = '';

    public function hasComment(): bool
    {
        return $this->comment !== '';
    }

    public function withComment(string $comment): self
    {
        $new = clone $this;
        $new->comment = $comment;
        return $new;
    }

    public function getComment(): string
    {
        return '%% ' . $this->comment;
    }
}
