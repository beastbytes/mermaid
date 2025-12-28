<?php

declare(strict_types=1);

namespace BeastBytes\Mermaid;

use JsonException;

/**
 * Diagram is the base class for all diagram types
 */
abstract class Diagram
{
    private const string MERMAID = "<pre %s>\n%s\n</pre>";
    private const string MERMAID_CLASS = 'mermaid';

    /**
     * @psalm-type list<string>
     * List of tag attributes that should be specially handled when their values are of array type.
     * In particular, if the value of the `data` attribute is `['name' => 'xyz', 'age' => 13]`, two attributes will be
     * generated instead of one: `data-name="xyz" data-age="13"`.
     */
    private const array DATA_ATTRIBUTES = ['data', 'data-ng', 'ng', 'aria'];

    private array $frontmatter = [];

    abstract protected function renderDiagram(): string;

    /**
     * @throws JsonException
     */
    public function render(array $attributes = []): string
    {
        $mermaid = $this->renderFrontmatter();
        $mermaid .= $this->renderDiagram();

        return sprintf(
            self::MERMAID,
            $this->renderAttributes($attributes),
            htmlspecialchars($mermaid)
        );
    }

    public function withFrontmatter(array $frontmatter): self
    {
        $new = clone $this;
        $new->frontmatter = $frontmatter;
        return $new;
    }

    private function renderFrontmatter(): string
    {
        $frontmatter = $this->array2yaml($this->frontmatter, 0);

        if (empty($frontmatter)) {
            return '';
        }

        return "---$frontmatter\n---\n";
    }

    private function array2yaml(array $ary, int $level): string
    {
        $yaml = '';
        $i = str_repeat(' ', 2 * $level);

        foreach ($ary as $k => $v) {
            if (is_array($v)) {
                $v = $this->array2yaml($v, $level + 1);
                $yaml .= "\n$i$k:$v";
            } else {
                $yaml .= "\n$i$k: $v";
            }
        }

        return $yaml;
    }

    /**
     * @throws JsonException
     */
    private function renderAttributes(array $attributes): string
    {
        if (isset($attributes['class'])) {
            if (!str_contains($attributes['class'], self::MERMAID_CLASS)) {
                $attributes['class'] .= ' ' . self::MERMAID_CLASS;
            }
        } else {
            $attributes['class'] = self::MERMAID_CLASS;
        }

        $attrs = [];

        /**
         * @var string $name
         * @var mixed $value
         */
        foreach ($attributes as $name => $value) {
            if (is_bool($value)) {
                if ($value) {
                    $attrs[] = $this->renderAttribute($name);
                }
            } elseif (is_array($value)) {
                if (in_array($name, self::DATA_ATTRIBUTES, true)) {
                    /** @psalm-var array<array-key, array|string|\Stringable|null> $value */
                    foreach ($value as $n => $v) {
                        $attrs[] = is_array($v)
                            ? $this->renderAttribute(
                                $name . '-' . $n,
                                json_encode(
                                    $v,
                                    JSON_UNESCAPED_UNICODE | JSON_HEX_QUOT | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_THROW_ON_ERROR,
                                    512
                                ),
                                '\''
                            )
                            : $this->renderAttribute($name . '-' . $n, $this->encodeAttribute($v));
                    }
                } elseif ($name === 'class') {
                    /** @var string[] $value */
                    if (empty($value)) {
                        continue;
                    }
                    $attrs[] = $this->renderAttribute($name, $this->encodeAttribute(implode(' ', $value)));
                } else {
                    $attrs[] = $this->renderAttribute(
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
                $attrs[] = $this->renderAttribute($name, $this->encodeAttribute($value));
            }
        }

        return implode(' ', $attrs);
    }

    private function encodeAttribute(mixed $value): string
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

    private function renderAttribute(string $name, string $encodedValue = '', string $quote = '"'): string
    {
        // The value, along with the "=" character, can be omitted altogether if the value is the empty string.
        if ($encodedValue === '') {
            return $name;
        }

        return $name . '=' . $quote . $encodedValue . $quote;
    }
}