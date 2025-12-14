<?php

use BeastBytes\Mermaid\Mermaid;
use BeastBytes\Mermaid\Tests\Support\Diagram;

test('Title trait', function () {
    $diagram = Mermaid::create(Diagram::class)
        ->withTitle('Test Title')
    ;

    expect($diagram->render())
        ->toBe(<<<Mermaid
<pre class="mermaid">
diagram
title Test Title
title &quot;Test Title&quot;
</pre>
Mermaid
        )
    ;
});
