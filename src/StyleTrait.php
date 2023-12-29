<?php
/**
 * @copyright Copyright © 2023 BeastBytes - All rights reserved
 * @license BSD 3-Clause
 */

declare(strict_types=1);

namespace BeastBytes\Mermaid;

trait StyleTrait
{
    /** @psalm-var array<string, array|string> $classDefs */
    private array $classDefs = [];

    /** @psalm-var array<string, NodeInterface[]> $styleClasses */
    private array $styleClasses = [];

    public function classDef(string $name, array|string $styles): self
    {
        $this->classDefs[$name] = $styles;
        return $this;
    }

    /** @psalm-param NodeInterface[] $nodes */
    public function styleClass(string $name, array $nodes): self
    {
        $this->styleClasses[$name] = $nodes;
        return $this;
    }

    public function renderStyles(string $indentation): string
    {
        $output = [];

        foreach ($this->classDefs as $name => $styles) {
            if (is_array($styles)) {
                $style = [];
                foreach ($styles as $property => $value) {
                    $style[] = "$property:$value";
                }
            } else {
                $style = [$styles];
            }

            $output[] = "classDef $name " . implode(',', $style);
        }

        foreach ($this->styleClasses as $class => $nodes) {
            $ids = [];
            foreach ($nodes as $node) {
                $ids[] = $node->getId();
            }

            $output[] = $node->getStyleClass() . ' ' . implode(',', $ids) . " $class";
        }

        return $indentation . implode("\n" . $indentation, $output);
    }
}
