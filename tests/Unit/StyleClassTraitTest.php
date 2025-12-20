<?php

declare(strict_types=1);

namespace BeastBytes\Mermaid\Tests\Unit;

use BeastBytes\Mermaid\Mermaid;
use BeastBytes\Mermaid\Tests\Support\Node;

test('Node with StyleClass', function () {
    $node = (new Node(id: NODE_ID))
        ->withStyleClass(STYLE_CLASS)
    ;

    expect(Mermaid::CLASS_OPERATOR)
        ->toBe(':::')
        ->and($node->render(''))
        ->toBe(NODE_ID . Mermaid::CLASS_OPERATOR . STYLE_CLASS)
    ;
});