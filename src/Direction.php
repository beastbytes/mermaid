<?php

declare(strict_types=1);

namespace BeastBytes\Mermaid;

enum Direction: string
{
    case bottomTop = 'BT';
    case leftRight = 'LR';
    case rightLeft = 'RL';
    case topBottom = 'TB';
}