<?php

declare(strict_types=1);

namespace BeastBytes\Mermaid\Tests\Unit;

use BeastBytes\Mermaid\Mermaid;
use BeastBytes\Mermaid\Tests\Support\Diagram;

test('Diagram with ClassDefs', function () {
    $diagram = Mermaid::create(Diagram::class)
        ->withClassDef([
            'class1' => 'font-size:12pt',
            'class2' => [
                'fill' => '#f9f',
                'stroke' =>'#333',
                'stroke-width' => '4px'
            ],
        ])
    ;

    expect($diagram->render())
        ->toBe("<pre class=\"mermaid\">\n"
               . "diagram\n"
               . Mermaid::INDENTATION . "classDef class1 font-size:12pt;\n"
               . Mermaid::INDENTATION . "classDef class2 fill:#f9f,stroke:#333,stroke-width:4px;\n"
               . '</pre>'
        )
        ->and($diagram->addClassDef(['class3' => 'font-size:18pt'])->render())
        ->toBe("<pre class=\"mermaid\">\n"
               . "diagram\n"
               . Mermaid::INDENTATION . "classDef class1 font-size:12pt;\n"
               . Mermaid::INDENTATION . "classDef class2 fill:#f9f,stroke:#333,stroke-width:4px;\n"
               . Mermaid::INDENTATION . "classDef class3 font-size:18pt;\n"
               . '</pre>'
        )
        ->and($diagram->withClassDef(['class4' => 'font-size:24pt'])->render())
        ->toBe("<pre class=\"mermaid\">\n"
               . "diagram\n"
               . Mermaid::INDENTATION . "classDef class4 font-size:24pt;\n"
               . '</pre>'
        )
    ;
});