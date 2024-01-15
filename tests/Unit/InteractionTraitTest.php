<?php
/**
 * @copyright Copyright © 2024 BeastBytes - All rights reserved
 * @license BSD 3-Clause
 */

declare(strict_types=1);

namespace BeastBytes\Mermaid\Tests\Unit;

use BeastBytes\Mermaid\Diagram\Diagram;
use BeastBytes\Mermaid\Diagram\Node;
use BeastBytes\Mermaid\Mermaid;

test('Diagram with interactions', function () {
    $diagram = (new Diagram())
        ->withNode(
            (new Node('Node1'))
                ->withInteraction('https://example.com')
        )
    ;

    expect($diagram->render())
        ->toBe("<pre class=\"mermaid\">\n"
               . "diagram\n"
               . "  _Node1\n"
               . "  click _Node1 href &quot;https://example.com&quot;\n"
               . '</pre>'
        )
    ;
});
