<?php

declare(strict_types=1);

namespace BeastBytes\Mermaid;

trait CommentTrait
{
    private ?string $comment = null;

    public function withComment(string $comment): self
    {
        $new = clone $this;
        $new->comment = $comment;
        return $new;
    }

    private function renderComment(string $indentation): string
    {
        return is_string($this->comment) ? $indentation . '%% ' . $this->comment : '';
    }
}