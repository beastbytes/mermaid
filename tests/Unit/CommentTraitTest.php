<?php

declare(strict_types=1);

namespace BeastBytes\Mermaid\Tests\Unit;

use BeastBytes\Mermaid\Tests\Support\Diagram;

test('Diagram with a comment', function () {
    $diagram = (new Diagram())
        ->withComment('Diagram comment')
    ;

    expect($diagram->render())
        ->toBe(<<<MERMAID
<pre class="mermaid">
%% Diagram comment
diagram
</pre>
MERMAID
        )
    ;
});