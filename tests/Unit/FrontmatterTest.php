<?php

declare(strict_types=1);

namespace BeastBytes\Mermaid\Tests\Unit;

use BeastBytes\Mermaid\Mermaid;
use BeastBytes\Mermaid\Tests\Support\Diagram;

test('Diagram with Frontmatter', function () {
    $diagram = Mermaid::create(
        Diagram::class,
        [
            'title' => 'Diagram title',
            'config' => [
                'theme' => 'base',
                'themeVariables' => [
                    'primaryColor' => "'#00ff00'",
                ],
            ],
        ]
    );

    expect($diagram->render())
        ->toBe("<pre class=\"mermaid\">\n"
            . "---\n"
            . "title: Diagram title\n"
            . "config:\n"
            . "  theme: base\n"
            . "  themeVariables:\n"
            . "    primaryColor: '#00ff00'\n"
            . "---\n"
            . "diagram\n"
            . '</pre>'
        )
    ;
});