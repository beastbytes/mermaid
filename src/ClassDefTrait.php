<?php
/**
 * @copyright Copyright © 2024 BeastBytes - All rights reserved
 * @license BSD 3-Clause
 */

declare(strict_types=1);

namespace BeastBytes\Mermaid;

trait ClassDefTrait
{
    /** @psalm-var array<string, array|string> $classDefs */
    private array $classDefs = [];

    public function addClassDef(array $classDef): self
    {
        $new = clone $this;
        $new->classDefs = array_merge($new->classDefs, $classDef);
        return $new;
    }

    public function withClassDef(array $classDef): self
    {
        $new = clone $this;
        $new->classDefs = $classDef;
        return $new;
    }

    private function getClassDefs(string $indentation, &$output): void
    {
        foreach ($this->classDefs as $name => $style) {
            if (is_array($style)) {
                $styles = [];
                foreach ($style as $property => $value) {
                    $styles[] = "$property:$value";
                }
                $style = implode(',', $styles);
            }

            $output[] = $indentation . "classDef $name $style;" ;
        }
    }

    private function hasClassDef(): bool
    {
        return $this->classDefs !== [];
    }
}
