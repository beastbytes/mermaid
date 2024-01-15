<?php
/**
 * @copyright Copyright © 2024 BeastBytes - All rights reserved
 * @license BSD 3-Clause
 */

declare(strict_types=1);

namespace BeastBytes\Mermaid\Tests\Unit;

use BeastBytes\Mermaid\Diagram\Diagram;
use BeastBytes\Mermaid\Mermaid;

test('Diagram with a comment', function () {
    $diagram = (new Diagram())
        ->withComment('Diagram comment')
    ;

    expect($diagram->render())
        ->toBe("<pre class=\"mermaid\">\n"
               . "%% Diagram comment\n"
               . "diagram\n"
               . '</pre>'
        )
    ;
});
