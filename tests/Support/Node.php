<?php
/**
 * @copyright Copyright © 2024 BeastBytes - All rights reserved
 * @license BSD 3-Clause
 */

declare(strict_types=1);

namespace BeastBytes\Mermaid\Diagram;

use BeastBytes\Mermaid\NodeInterface;
use BeastBytes\Mermaid\NodeTrait;
use BeastBytes\Mermaid\StyleClassTrait;
use BeastBytes\Mermaid\TextTrait;

class Node implements NodeInterface
{
    use NodeTrait;
    use StyleClassTrait;
    use TextTrait;

    public function __construct(
        private readonly string $id
    )
    {
    }

    public function render(string $indentation)
    {
        return $indentation . $this->getId() . $this->getStyleClass() . $this->getText(' ');
    }
}
