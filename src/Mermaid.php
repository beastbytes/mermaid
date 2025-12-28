<?php

declare(strict_types=1);

namespace BeastBytes\Mermaid;

use JsonException;
use const JSON_HEX_AMP;
use const JSON_HEX_APOS;
use const JSON_HEX_QUOT;
use const JSON_HEX_TAG;
use const JSON_UNESCAPED_UNICODE;

class Mermaid
{
    public const string CLASS_OPERATOR = ':::';
    public const string ID_PREFIX = 'mrmd';
    public const string INDENTATION = '  ';
    public const string JS = "import mermaid from 'https://cdn.jsdelivr.net/npm/mermaid@11/dist/mermaid.esm.min.mjs'\nmermaid.initialize(%s)";
    public const string SCRIPT_TAG = "<script type=\"module\">\n%s\n</script>";

    /**
     * List of tag attributes that should be specially handled when their values are of array type.
     * In particular, if the value of the `data` attribute is `['name' => 'xyz', 'age' => 13]`, two attributes will be
     * generated instead of one: `data-name="xyz" data-age="13"`.
     */
    private const array DATA_ATTRIBUTES = ['data', 'data-ng', 'ng', 'aria'];

    /** @var int Tracks auto-generated object IDs to ensure uniqueness */
    private static int $id = 0;

    /** @psalm-suppress LessSpecificReturnStatement, MoreSpecificReturnType */
    public static function create(string $diagram, array $frontmatter= []): Diagram
    {
        return (new $diagram())->withFrontmatter($frontmatter);
    }

    public static function getId(): string
    {
        return self::ID_PREFIX . self::$id++;
    }

    /**
     * @throws JsonException
     */
    public static function js(?array $config = null): string
    {
        return sprintf(
            self::JS,
            $config === null ? '' : json_encode($config, JSON_THROW_ON_ERROR)
        );
    }

    /**
     * @throws JsonException
     */
    public static function scriptTag(?array $config = null): string
    {
        return sprintf(self::SCRIPT_TAG, self::js($config));
    }
}