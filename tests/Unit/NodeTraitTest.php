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

test('Simple node', function () {
    $node = new Node(NODE_ID);

    expect($node->getId())
        ->toBe('_' . NODE_ID)
        ->and($node->render(Mermaid::INDENTATION))
        ->toBe(Mermaid::INDENTATION . '_' . NODE_ID)
    ;
});
