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
    public const JS = "<script type=\"module\">\n    import mermaid from 'https://cdn.jsdelivr.net/npm/mermaid@10/dist/mermaid.esm.min.mjs'\n    mermaid.initialize(%s)\n</script>";
    private const MERMAID = "<pre class=\"mermaid\">\n%s\n</pre>";

    /** @psalm-suppress LessSpecificReturnStatement, MoreSpecificReturnType */
    public static function create(string $name, array $parameters = []): MermaidInterface
    {
        $fqcn = __NAMESPACE__ . str_repeat("\\$name", 2);
        return new $fqcn(...$parameters);
    }

    /**
     * @throws \JsonException
     */
    public static function js(?array $config = null): string
    {
        return sprintf(
            self::JS,
            $config === null ? '' : json_encode($config, JSON_THROW_ON_ERROR)
        );
    }

    /** @psalm-param list<string> $mermaid */
    public static function render(array $mermaid): string
    {
        return sprintf(self::MERMAID, htmlspecialchars(implode("\n", $mermaid)));
    }
}
