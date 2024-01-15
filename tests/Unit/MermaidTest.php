<?php
/**
 * @copyright Copyright © 2024 BeastBytes - All rights reserved
 * @license BSD 3-Clause
 */

declare(strict_types=1);

namespace BeastBytes\Mermaid\Tests\Unit;

use BeastBytes\Mermaid\Mermaid;
use BeastBytes\Mermaid\MermaidInterface;
use BeastBytes\Mermaid\Diagram\Diagram;

test('Mermaid create', function () {
    $diagram = Mermaid::create('Diagram');

    expect($diagram)
        ->toBeInstanceOf(MermaidInterface::class)
        ->toBeInstanceOf(Diagram::class)
    ;
});

test('Mermaid JavaScript', function () {
    expect(Mermaid::js())
        ->toBe("import mermaid from 'https://cdn.jsdelivr.net/npm/mermaid@10/dist/mermaid.esm.min.mjs'\n"
            . 'mermaid.initialize()'
        )
        ->and(Mermaid::scriptTag())
        ->toBe("<script type=\"module\">\n"
            . "import mermaid from 'https://cdn.jsdelivr.net/npm/mermaid@10/dist/mermaid.esm.min.mjs'\n"
            . "mermaid.initialize()\n"
            . '</script>'
        )
        ->and(Mermaid::js(['startOnLoad' => true]))
        ->toBe("import mermaid from 'https://cdn.jsdelivr.net/npm/mermaid@10/dist/mermaid.esm.min.mjs'\n"
            . 'mermaid.initialize({"startOnLoad":true})'
        )
        ->and(Mermaid::scriptTag(['startOnLoad' => true]))
        ->toBe("<script type=\"module\">\n"
            . "import mermaid from 'https://cdn.jsdelivr.net/npm/mermaid@10/dist/mermaid.esm.min.mjs'\n"
            . "mermaid.initialize({\"startOnLoad\":true})\n"
            . '</script>'
        )
    ;
});

test('Mermaid render', function () {
    $diagram = Mermaid::create('Diagram');

    expect($diagram->render())
        ->toBe("<pre class=\"mermaid\">\n"
            . "diagram\n"
            . '</pre>'
        )
    ;
});
