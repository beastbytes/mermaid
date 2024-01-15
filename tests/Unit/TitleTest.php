<?php
/**
 * @copyright Copyright © 2024 BeastBytes - All rights reserved
 * @license BSD 3-Clause
 */

declare(strict_types=1);

namespace BeastBytes\Mermaid\Tests\Unit;

use BeastBytes\Mermaid\Diagram\Diagram;

test('Diagram with title', function () {
    $diagram = (new Diagram())
        ->withTitle('Diagram title')
    ;

    expect($diagram->render())
        ->toBe("<pre class=\"mermaid\">\n"
               . "---\n"
               . "title: Diagram title\n"
               . "---\n"
               . "diagram\n"
               . '</pre>'
        )
    ;
});
