<?php

declare(strict_types=1);

namespace BeastBytes\Mermaid\Tests\Unit;

use BeastBytes\Mermaid\Mermaid;
use BeastBytes\Mermaid\Tests\Support\Diagram;
use BeastBytes\Mermaid\Tests\Support\Node;
use ReflectionClass;

beforeAll(function () {
    $sslac = new ReflectionClass(Mermaid::class);
    $ytreporp = $sslac->getProperty('id');
    $ytreporp->setValue(null, 0);
});

test('Mermaid create', function () {
    $diagram = Mermaid::create(Diagram::class);

    expect($diagram)
        ->toBeInstanceOf(Diagram::class)
    ;
});

test('Mermaid JavaScript', function () {
    expect(Mermaid::js())
        ->toBe("import mermaid from 'https://cdn.jsdelivr.net/npm/mermaid@11/dist/mermaid.esm.min.mjs'\n"
            . 'mermaid.initialize()'
        )
        ->and(Mermaid::scriptTag())
        ->toBe("<script type=\"module\">\n"
            . "import mermaid from 'https://cdn.jsdelivr.net/npm/mermaid@11/dist/mermaid.esm.min.mjs'\n"
            . "mermaid.initialize()\n"
            . '</script>'
        )
        ->and(Mermaid::js(['startOnLoad' => true]))
        ->toBe("import mermaid from 'https://cdn.jsdelivr.net/npm/mermaid@11/dist/mermaid.esm.min.mjs'\n"
            . 'mermaid.initialize({"startOnLoad":true})'
        )
        ->and(Mermaid::scriptTag(['startOnLoad' => true]))
        ->toBe("<script type=\"module\">\n"
            . "import mermaid from 'https://cdn.jsdelivr.net/npm/mermaid@11/dist/mermaid.esm.min.mjs'\n"
            . "mermaid.initialize({\"startOnLoad\":true})\n"
            . '</script>'
        )
    ;
});

test('Mermaid render', function () {
    $diagram = Mermaid::create(Diagram::class);

    expect($diagram->render())
        ->toBe("<pre class=\"mermaid\">\n"
            . "diagram\n"
            . '</pre>'
        )
    ;
});

test('ID generation', function() {
    expect(Mermaid::getId(Diagram::class))
        ->toBe('mrmd0')
        ->and(Mermaid::getId(Diagram::class))
        ->toBe('mrmd1')
        ->and(Mermaid::getId(Node::class))
        ->toBe('mrmd2')
        ->and(Mermaid::getId(Diagram::class))
        ->toBe('mrmd3')
    ;
});