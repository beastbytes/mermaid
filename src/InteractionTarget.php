<?php

declare(strict_types=1);

namespace BeastBytes\Mermaid;

enum InteractionTarget: string
{
    case blank = '_blank';
    case parent = '_parent';
    case self = '_self';
    case top = '_top';
}