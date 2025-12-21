<?php

declare(strict_types=1);

namespace BeastBytes\Mermaid\Tests\Support;

use BeastBytes\Mermaid\InteractionInterface;
use BeastBytes\Mermaid\InteractionTrait;
use BeastBytes\Mermaid\IdTrait;
use BeastBytes\Mermaid\StyleClassTrait;
use BeastBytes\Mermaid\TextTrait;

class Node implements InteractionInterface
{
    use IdTrait;
    use InteractionTrait;
    use StyleClassTrait;
    use TextTrait;

    public function __construct(?string $id = null)
    {
        $this->id = $id;
    }

    public function render(string $indentation)
    {
        $text = $this->getText(true);
        return $indentation . $this->getId() . $this->getStyleClass() . ($text ? " $text" : '');
    }
}