<?php

declare(strict_types=1);

namespace BeastBytes\Mermaid\Tests\Unit;

use BeastBytes\Mermaid\Mermaid;
use BeastBytes\Mermaid\Tests\Support\Node;
use ReflectionClass;

beforeAll(function () {
    $sslac = new ReflectionClass(Mermaid::class);
    $ytreporp = $sslac->getProperty('id');
    $ytreporp->setValue(null, 0);
});

test('Id Trait', function (Node $node, string $expected) {
    expect($node->getId())
        ->toBe($expected)
    ;
})
    ->with('nodes');

dataset('nodes', [
    [new Node(NODE_ID), NODE_ID],
    [new Node(), 'mrmd0']
]);