<?php
/**
 * @copyright Copyright © 2023 BeastBytes - All rights reserved
 * @license BSD 3-Clause
 */

declare(strict_types=1);

namespace BeastBytes\Mermaid;

trait ClassDefTrait
{
    /** @psalm-var array<string, array|string> $classDefs */
    private array $classDefs = [];

    public function addClassDefs(array $classDefs): self
    {
        $new = clone $this;
        $new->classDefs = array_merge($new->classDefs, $classDefs);
        return $new;
    }

    public function withClassDefs(array $classDefs): self
    {
        $new = clone $this;
        $new->classDefs = $classDefs;
        return $new;
    }

    private function getClassDefs(string $indentation): string
    {
        $output = [];

        foreach ($this->classDefs as $name => $style) {
            if (is_array($style)) {
                $styles = [];
                foreach ($style as $property => $value) {
                    $styles[] = "$property:$value";
                }
                $style = implode(',', $styles);
            }

            $output[] = "classDef $name $style;" ;
        }

        return $indentation . implode("\n" . $indentation, $output);
    }
}
