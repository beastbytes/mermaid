<?php

declare(strict_types=1);

namespace BeastBytes\Mermaid;

enum InteractionType: string
{
    case Callback = 'call';
    case Link = 'href';
}