<?php

declare(strict_types=1);

namespace BeastBytes\Mermaid\Tests\Unit;

use BeastBytes\Mermaid\InteractionType;
use BeastBytes\Mermaid\Mermaid;
use BeastBytes\Mermaid\Tests\Support\Diagram;
use BeastBytes\Mermaid\Tests\Support\Node;

test('Diagram with interactions', function () {
    $diagram = Mermaid::create(Diagram::class)
        ->withNode(
            (new Node('Node1'))
                ->withInteraction('https://example.com', InteractionType::Link)
        )
    ;

    expect($diagram->render())
        ->toBe("<pre class=\"mermaid\">\n"
            . "diagram\n"
            . "  _Node1\n"
            . "  click _Node1 href &quot;https://example.com&quot; _self\n"
            . '</pre>'
        )
    ;

    $diagram = (new Diagram())
        ->withNode(
            (new Node('Node1'))
                ->withInteraction('callback()', InteractionType::Callback)
        )
    ;

    expect($diagram->render())
        ->toBe("<pre class=\"mermaid\">\n"
            . "diagram\n"
            . "  _Node1\n"
            . "  click _Node1 call callback()\n"
            . '</pre>'
        )
    ;
});