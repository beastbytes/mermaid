<?php
/**
 * @copyright Copyright © 2023 BeastBytes - All rights reserved
 * @license BSD 3-Clause
 */

declare(strict_types=1);

namespace BeastBytes\Mermaid\Tests\Unit;

use BeastBytes\Mermaid\Diagram\Diagram;
use BeastBytes\Mermaid\Mermaid;
use BeastBytes\Mermaid\MermaidInterface;

test('Mermaid create', function () {
    $mermaid = Mermaid::create('Diagram');
    expect($mermaid)
        ->toBeInstanceOf(MermaidInterface::class)
        ->toBeInstanceOf(Diagram::class)
    ;
});

test('Mermaid JavaScript', function () {
    expect(Mermaid::js())
        ->toBe(sprintf(Mermaid::JS, '{"startOnLoad":true}'))
    ;
});

test('Mermaid render', function () {
    $result = Mermaid::create('Diagram')->render();
    expect($result)
        ->toBe(sprintf(Mermaid::MERMAID, Diagram::OUTPUT))
    ;
});
