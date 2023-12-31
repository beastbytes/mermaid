<?php
/**
 * @copyright Copyright © 2023 BeastBytes - All rights reserved
 * @license BSD 3-Clause
 */

declare(strict_types=1);

namespace BeastBytes\Mermaid\Tests\Unit;

use BeastBytes\Mermaid\Mermaid;
use BeastBytes\Mermaid\MermaidInterface;
use BeastBytes\Mermaid\Tests\Support\Diagram;

test('Mermaid create', function () {
    $diagram = Mermaid::create('Diagram');

    expect($diagram)
        ->toBeInstanceOf(MermaidInterface::class)
        ->toBeInstanceOf(Diagram::class)
    ;
});

test('Mermaid JavaScript', function () {
    expect(Mermaid::js())
        ->toBe("<script type=\"module\">\n"
            . "    import mermaid from 'https://cdn.jsdelivr.net/npm/mermaid@10/dist/mermaid.esm.min.mjs'\n"
            . "    mermaid.initialize()\n"
            . '</script>'
        )
    ;
});

test('Mermaid render', function () {
    $diagram = Mermaid::create('Diagram');

    expect($diagram->render())
        ->toBe("<pre class=\"mermaid\">\n"
            . "  Node1\n"
            . "  Node2\n"
            . '</pre>'
        )
    ;
});
