<?php
/**
 * @copyright Copyright © 2024 BeastBytes - All rights reserved
 * @license BSD 3-Clause
 */

declare(strict_types=1);

namespace BeastBytes\Mermaid\Diagram;

use BeastBytes\Mermaid\ClassDefTrait;
use BeastBytes\Mermaid\CommentTrait;
use BeastBytes\Mermaid\InteractionRendererTrait;
use BeastBytes\Mermaid\Mermaid;
use BeastBytes\Mermaid\MermaidInterface;
use BeastBytes\Mermaid\RenderItemsTrait;
use BeastBytes\Mermaid\TitleTrait;

class Diagram implements MermaidInterface
{
    use CommentTrait;
    use ClassDefTrait;
    use InteractionRendererTrait;
    use RenderItemsTrait;
    use TitleTrait;

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
    public function render(): string
    {
        $output = [];

        $this->renderTitle($output);
        $this->renderComment('', $output);

        $output[] = self::TYPE;

        $this->renderItems($this->nodes, '', $output);
        $this->renderInteractions($this->nodes, $output);
        $this->renderClassDefs( $output);

        return Mermaid::render($output);
    }
}
