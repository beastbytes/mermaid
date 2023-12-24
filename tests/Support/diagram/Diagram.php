<?php
/**
 * @copyright Copyright © 2023 BeastBytes - All rights reserved
 * @license BSD 3-Clause
 */

declare(strict_types=1);

namespace BeastBytes\Mermaid\Diagram;

use BeastBytes\Mermaid\Mermaid;
use BeastBytes\Mermaid\MermaidInterface;

class Diagram implements MermaidInterface
{
    public const OUTPUT = 'mermaid';

    public function render(): string
    {
        return Mermaid::render(self::OUTPUT);
    }
}
