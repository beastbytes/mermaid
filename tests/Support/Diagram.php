<?php
/**
 * @copyright Copyright © 2024 BeastBytes - All rights reserved
 * @license BSD 3-Clause
 */

declare(strict_types=1);

namespace BeastBytes\Mermaid\Diagram;

use BeastBytes\Mermaid\ClassDefTrait;
use BeastBytes\Mermaid\InteractionRendererTrait;
use BeastBytes\Mermaid\Mermaid;
use BeastBytes\Mermaid\MermaidInterface;
use BeastBytes\Mermaid\RenderItemsTrait;
use BeastBytes\Mermaid\TitleTrait;

class Diagram implements MermaidInterface
{
    use ClassDefTrait;
    use InteractionRendererTrait;
    use RenderItemsTrait;
    use TitleTrait;

    private const TYPE = 'diagram';

    private array $nodes = [];

    /**
     * @throws \JsonException
     */
    public function render(): string
    {
        $output = [];

        if ($this->hasTitle()) {
            $this->getTitle($output);
        }

        $output[] = self::TYPE;

        $this->renderItems($this->nodes, '', $output);

        if ($this->hasClassDef()) {
            $this->getClassDefs(Mermaid::INDENTATION, $output);
        }

        return Mermaid::render($output);
    }
}
