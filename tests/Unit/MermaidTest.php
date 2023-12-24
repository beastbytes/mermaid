<?php

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

test('Mermaid render', function () {
    $result = Mermaid::create('Diagram')->render();
    expect($result)
        ->toBe(sprintf(Mermaid::MERMAID, Diagram::OUTPUT))
    ;
});
