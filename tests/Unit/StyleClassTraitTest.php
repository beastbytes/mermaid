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
const STYLE_CLASS = 'styleClass';

test('Node with StyleClass', function () {
    $node = (new Node(id: NODE_ID))->withStyleClass(STYLE_CLASS);

    expect(Mermaid::CLASS_OPERATOR)
        ->toBe(':::')
        ->and($node->render(Mermaid::INDENTATION))
        ->toBe(Mermaid::INDENTATION . '_' . NODE_ID . Mermaid::CLASS_OPERATOR . STYLE_CLASS)
    ;
});
