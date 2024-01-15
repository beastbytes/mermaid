<?php
/**
 * @copyright Copyright © 2024 BeastBytes - All rights reserved
 * @license BSD 3-Clause
 */

declare(strict_types=1);

namespace BeastBytes\Mermaid\Tests\Unit;

use BeastBytes\Mermaid\Mermaid;
use BeastBytes\Mermaid\Diagram\Node;

const NODE_ID = 'nodeId';
const STYLE_CLASS = 'styleClass';

test('Node with StyleClass', function () {
    $node = (new Node(id: NODE_ID))->withStyleClass(STYLE_CLASS);

    expect(Mermaid::CLASS_OPERATOR)
        ->toBe(':::')
        ->and($node->render(''))
        ->toBe('_' . NODE_ID . Mermaid::CLASS_OPERATOR . STYLE_CLASS)
    ;
});
