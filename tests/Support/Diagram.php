<?php
/**
 * @copyright Copyright © 2023 BeastBytes - All rights reserved
 * @license BSD 3-Clause
 */

declare(strict_types=1);

namespace BeastBytes\Mermaid\Tests\Support;

use BeastBytes\Mermaid\ClassDefTrait;
use BeastBytes\Mermaid\Mermaid;
use BeastBytes\Mermaid\MermaidInterface;

class Diagram implements MermaidInterface
{
    use ClassDefTrait;

    private const OUTPUT = ['  Node1', '  Node2'];
    private const TYPE = 'diagram';

    public function __construct()
    {
    }

    /**
     * @throws \JsonException
     */
    public function render(): string
    {
        $output = self::OUTPUT;
        $output[] = $this->renderClassDefs(Mermaid::INDENTATION);
        return Mermaid::render($output);
    }
}
