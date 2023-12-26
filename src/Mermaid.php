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
    private const CONFIG = "%%%%{init:%s}\n";
    private const MERMAID = "<pre class=\"mermaid\">\n%s\n</pre>";

    public static function create(string $name, array $parameters = []): MermaidInterface
    {
        $fqcn = __NAMESPACE__ . str_repeat("\\$name", 2);
        return new $fqcn(...$parameters);
    }

    public static function js(array $config = ['startOnLoad' => true]): string
    {
        return sprintf(self::JS, json_encode($config));
    }

    public static function render(string $mermaid, ?array $config): string
    {
        if ($config !== null) {
            $mermaid = sprintf(self::CONFIG, json_encode($config, JSON_THROW_ON_ERROR)) . $mermaid;
        }
        return sprintf(self::MERMAID, $mermaid);
    }
}
