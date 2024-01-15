<?php
/**
 * @copyright Copyright © 2024 BeastBytes - All rights reserved
 * @license BSD 3-Clause
 */

declare(strict_types=1);

namespace BeastBytes\Mermaid\Tests\Unit;

use BeastBytes\Mermaid\Diagram\Node;

const NODE_ID = 'nodeId';
const NODE_TEXT = 'Node text';

test('Node with text', function () {
    expect((new Node(id: NODE_ID))->withText(text: NODE_TEXT)->render(''))
        ->toBe('_' . NODE_ID . ' "' . NODE_TEXT . '"')
    ;
});

test('Node with Markdown text', function () {
    expect((new Node(id: NODE_ID))->withText(text: NODE_TEXT, isMarkdown: true)->render(''))
        ->toBe('_' . NODE_ID . ' "`' . NODE_TEXT . '`"')
    ;
});
