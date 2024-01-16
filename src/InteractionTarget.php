<?php
/**
 * @copyright Copyright © 2024 BeastBytes - All rights reserved
 * @license BSD 3-Clause
 */

declare(strict_types=1);

namespace BeastBytes\Mermaid;

enum InteractionTarget: string
{
    case Blank = '_blank';
    case Parent = '_parent';
    case Self = '_self';
    case Top = '_top';
}
