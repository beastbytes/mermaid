<?php
/**
 * @copyright Copyright © 2024 BeastBytes - All rights reserved
 * @license BSD 3-Clause
 */

declare(strict_types=1);

namespace BeastBytes\Mermaid\Tests\Support;

use BeastBytes\Mermaid\ClassDefTrait;
use BeastBytes\Mermaid\CommentTrait;
use BeastBytes\Mermaid\InteractionRendererTrait;
use BeastBytes\Mermaid\RenderItemsTrait;

class Diagram extends \BeastBytes\Mermaid\Diagram
{
    use CommentTrait;
    use ClassDefTrait;
    use InteractionRendererTrait;
    use RenderItemsTrait;

    private const TYPE = 'diagram';

    private array $nodes = [];

    public function withNode(Node ...$node)
    {
        $new = clone $this;
        $new->nodes = $node;
        return $new;
    }

    /**
     * @throws \JsonException
     */
    public function renderDiagram(): string
    {
        $diagram = [];

        if ($this->hasComment()) {
            $diagram[] = $this->renderComment('');
        }

        $diagram[] = self::TYPE;

        $diagram[] = $this->renderItems($this->nodes, '');
        $diagram[] = $this->renderInteractions($this->nodes);
        $diagram[] = $this->renderClassDefs();

        return implode("\n", array_filter($diagram, fn($v) => !empty($v)));
    }
}