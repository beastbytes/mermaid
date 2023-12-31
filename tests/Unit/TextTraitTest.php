<?php
/**
 * @copyright Copyright © 2023 BeastBytes - All rights reserved
 * @license BSD 3-Clause
 */

declare(strict_types=1);

namespace BeastBytes\Mermaid\Tests\Unit;

use BeastBytes\Mermaid\Mermaid;
use BeastBytes\Mermaid\Tests\Support\Node;

const NODE_ID = 'nodeId';
const NODE_TEXT = 'Node text';

test('Node with text', function () {
    expect((new Node(id: NODE_ID, text: NODE_TEXT))->render(Mermaid::INDENTATION))
        ->toBe(Mermaid::INDENTATION . '_' . NODE_ID . ' "' . NODE_TEXT . '"')
    ;
});

test('Node with Markdown text', function () {
    expect((new Node(id: NODE_ID, text: NODE_TEXT, isMarkdown: true))->render(Mermaid::INDENTATION))
        ->toBe(Mermaid::INDENTATION . '_' . NODE_ID . ' "`' . NODE_TEXT . '`"')
    ;
});
