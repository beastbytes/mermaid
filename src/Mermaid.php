<?php
/**
 * @copyright Copyright © 2024 BeastBytes - All rights reserved
 * @license BSD 3-Clause
 */

declare(strict_types=1);

namespace BeastBytes\Mermaid;

use const JSON_HEX_AMP;
use const JSON_HEX_APOS;
use const JSON_HEX_QUOT;
use const JSON_HEX_TAG;
use const JSON_UNESCAPED_UNICODE;

class Mermaid
{
    public const CLASS_OPERATOR = ':::';
    public const INDENTATION = '  ';
    public const JS = "import mermaid from 'https://cdn.jsdelivr.net/npm/mermaid@11/dist/mermaid.esm.min.mjs'\nmermaid.initialize(%s)";
    private const MERMAID = "<pre %s>\n%s\n</pre>";
    private const MERMAID_CLASS = 'mermaid';
    public const SCRIPT_TAG = "<script type=\"module\">\n%s\n</script>";

    /**
     * List of tag attributes that should be specially handled when their values are of array type.
     * In particular, if the value of the `data` attribute is `['name' => 'xyz', 'age' => 13]`, two attributes will be
     * generated instead of one: `data-name="xyz" data-age="13"`.
     */
    private const DATA_ATTRIBUTES = ['data', 'data-ng', 'ng', 'aria'];

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

    /**
     * @throws \JsonException
     */
    public static function scriptTag(?array $config = null): string
    {
        return sprintf(self::SCRIPT_TAG, self::js($config));
    }

    /** @psalm-param list<string> $mermaid
     * @throws \JsonException
     */
    public static function render(array $mermaid, array $attributes = []): string
    {
        if (isset($attributes['class'])) {
            if (!str_contains($attributes['class'], self::MERMAID_CLASS)) {
                $attributes['class'] .= ' ' . self::MERMAID_CLASS;
            }
        } else {
            $attributes['class'] = self::MERMAID_CLASS;
        }

        return sprintf(
            self::MERMAID,
            self::renderAttributes($attributes),
            implode("\n", $mermaid)
        );
    }

    /**
     * @throws \JsonException
     */
    private static function renderAttributes(array $attributes): string
    {
        $attrs = [];

        /**
         * @var string $name
         * @var mixed $value
         */
        foreach ($attributes as $name => $value) {
            if (is_bool($value)) {
                if ($value) {
                    $attrs[] = self::renderAttribute($name);
                }
            } elseif (is_array($value)) {
                if (in_array($name, self::DATA_ATTRIBUTES, true)) {
                    /** @psalm-var array<array-key, array|string|\Stringable|null> $value */
                    foreach ($value as $n => $v) {
                        $attrs[] = is_array($v)
                            ? self::renderAttribute(
                                $name . '-' . $n,
                                json_encode(
                                    $v,
                                    JSON_UNESCAPED_UNICODE | JSON_HEX_QUOT | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_THROW_ON_ERROR,
                                    512
                                ),
                                '\''
                            )
                            : self::renderAttribute($name . '-' . $n, self::encodeAttribute($v));
                    }
                } elseif ($name === 'class') {
                    /** @var string[] $value */
                    if (empty($value)) {
                        continue;
                    }
                    $attrs[] = self::renderAttribute($name, self::encodeAttribute(implode(' ', $value)));
                } else {
                    $attrs[] = self::renderAttribute(
                        $name,
                        json_encode(
                            $value,
                            JSON_UNESCAPED_UNICODE | JSON_HEX_QUOT | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_THROW_ON_ERROR,
                            512
                        ),
                        '\''
                    );
                }
            } elseif ($value !== null) {
                $attrs[] = self::renderAttribute($name, self::encodeAttribute($value));
            }
        }

        return implode(' ', $attrs);
    }

    private static function encodeAttribute(mixed $value): string
    {
        $value = htmlspecialchars(
            (string) $value,
            ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML5,
            'UTF-8',
            true
        );

        return strtr($value, [
            "\u{0000}" => '&#0;', // U+0000 NULL
        ]);
    }

    private static function renderAttribute(string $name, string $encodedValue = '', string $quote = '"'): string
    {
        // The value, along with the "=" character, can be omitted altogether if the value is the empty string.
        if ($encodedValue === '') {
            return $name;
        }

        return $name . '=' . $quote . $encodedValue . $quote;
    }
}
