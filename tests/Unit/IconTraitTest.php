<?php

use BeastBytes\Mermaid\Tests\Support\Node;

defined('ICON') or define('ICON', 'fa fa-book');

test('Icon Trait', function () {
    expect(
        (new Node('NodeId'))
            ->withIcon(ICON)
            ->render('')
    )
        ->toBe(<<<EXPECTED
NodeId::icon(fa fa-book)
EXPECTED
        )
    ;
});