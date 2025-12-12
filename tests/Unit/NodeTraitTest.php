<?php

declare(strict_types=1);

namespace BeastBytes\Mermaid\Tests\Unit;

use BeastBytes\Mermaid\Tests\Support\Node;

test('Simple node', function () {
    $node = new Node(NODE_ID);

    expect($node->getId())
        ->toBe('_' . NODE_ID)
        ->and($node->render(''))
        ->toBe('_' . NODE_ID)
    ;
});