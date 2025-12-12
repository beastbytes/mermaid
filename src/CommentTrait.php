<?php

declare(strict_types=1);

namespace BeastBytes\Mermaid;

trait CommentTrait
{
    private ?string $comment = null;

    public function hasComment(): bool
    {
        return is_string($this->comment);
    }

    public function withComment(string $comment): self
    {
        $new = clone $this;
        $new->comment = $comment;
        return $new;
    }

    private function renderComment(string $indentation): ?string
    {
        return $this->comment === null ? null : $indentation . '%% ' . $this->comment;
    }
}