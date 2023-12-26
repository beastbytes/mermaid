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
    $diagram = Mermaid::create('Diagram');

    expect($diagram)
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
    $diagram = Mermaid::create('Diagram');

    expect($diagram->render())
        ->toBe("<pre class=\"mermaid\">\n"
               . Diagram::OUTPUT . "\n"
               . '</pre>'
        )
    ;
});

test('Mermaid with config', function () {
    $diagram = Mermaid::create('Diagram', ['config' => [Diagram::TYPE => ['name' => 'value']]]);

    expect($diagram->render())
        ->toBe("<pre class=\"mermaid\">\n"
             . '%%{init:{"diagram":{"name":"value"}}}' . "\n"
             . Diagram::OUTPUT . "\n"
             . '</pre>'
        )
    ;
});
