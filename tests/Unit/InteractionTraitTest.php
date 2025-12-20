<?php

declare(strict_types=1);

namespace BeastBytes\Mermaid\Tests\Unit;

use BeastBytes\Mermaid\InteractionType;
use BeastBytes\Mermaid\Mermaid;
use BeastBytes\Mermaid\Tests\Support\Diagram;
use BeastBytes\Mermaid\Tests\Support\Node;
use ReflectionClass;

beforeAll(function () {
    $sslac = new ReflectionClass(Mermaid::class);
    $ytreporp = $sslac->getProperty('id');
    $ytreporp->setValue(null, 0);
});

test('Diagram with interactions', function () {
    $diagram = Mermaid::create(Diagram::class)
        ->withNode(
            (new Node('Node1'))
                ->withInteraction('https://example.com', InteractionType::Link)
        )
    ;

    expect($diagram->render())
        ->toBe(<<<MERMAID
<pre class="mermaid">
diagram
  Node1
  click Node1 href &quot;https://example.com&quot; _self
</pre>
MERMAID
        )
    ;

    $diagram = (new Diagram())
        ->withNode(
            (new Node('Node1'))
                ->withInteraction('callback()', InteractionType::Callback)
        )
    ;

    expect($diagram->render())
        ->toBe(<<<MERMAID
<pre class="mermaid">
diagram
  Node1
  click Node1 call callback()
</pre>
MERMAID
        )
    ;
});