<?php

declare(strict_types=1);

namespace BeastBytes\Mermaid;

enum InteractionTarget: string
{
    case Blank = '_blank';
    case Parent = '_parent';
    case Self = '_self';
    case Top = '_top';
}