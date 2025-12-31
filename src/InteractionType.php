<?php

declare(strict_types=1);

namespace BeastBytes\Mermaid;

enum InteractionType: string
{
    case callback = 'call';
    case link = 'href';
}