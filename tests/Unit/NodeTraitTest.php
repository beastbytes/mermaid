<?php
/**
 * @copyright Copyright © 2024 BeastBytes - All rights reserved
 * @license BSD 3-Clause
 */

declare(strict_types=1);

namespace BeastBytes\Mermaid\Tests\Unit;

use BeastBytes\Mermaid\Diagram\Node;

const NODE_ID = 'nodeId';

test('Simple node', function () {
    $node = new Node(NODE_ID);

    expect($node->getId())
        ->toBe('_' . NODE_ID)
        ->and($node->render(''))
        ->toBe('_' . NODE_ID)
    ;
});
