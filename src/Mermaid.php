<?php
/**
 * @copyright Copyright © 2023 BeastBytes - All rights reserved
 * @license BSD 3-Clause
 */

declare(strict_types=1);

namespace BeastBytes\Mermaid;

class Mermaid
{
    public const INDENTATION = '  ';
    public const MERMAID = "<pre class=\"mermaid\">\n%s\n</pre>";

    public static function create(string $name, array $parameters = []): MermaidInterface
    {
        $fqcn = __NAMESPACE__ . str_repeat("\\$name", 2);
        return new $fqcn(...$parameters);
    }

    public static function render(string $mermaid): string
    {
        return sprintf(self::MERMAID, $mermaid);
    }
}
