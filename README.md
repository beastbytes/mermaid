# Mermaid
PHP for the [Mermaid.js](https://mermaid.js.org/) diagramming and charting tool.

For license information see the [LICENSE](LICENSE.md) file.

## Installation
This package is a dependency of, and so installed with, the various Mermaid charts and diagrams.

## Usage
### Creating a Mermaid Chart/Diagram
Call `Mermaid::create(DiagramFQCN)` to get an instance of a diagram;
all Mermaid diagram instances are immutable.

`Mermaid::create()` accepts an optional second argument;
an associative array that specifies the configuration [Frontmatter](https://mermaid.js.org/config/configuration.html) for the diagram.
For example `Mermaid::create('Flowchart', ['title' => 'Example Flowchart])` specifies the title.

Configure the diagram as required - see the documentation for the diagram type for details,
then call the diagram's `render()` method.

#### Pie Chart Example
```php
/** @var array<string, float|int> $values */
echo Mermaid::create(PieChart::class)
    ->withValues($values)
    ->render()
;
```

### Importing Mermaid
Import Mermaid with `Mermaid::js()`, enclosing the return value in a `script` tag;
`Mermaid::js()` accepts an optional array of configuration values.
#### Example
`Mermaid::js(['startOnLoad' => true])`

### Enumerations
The package includes Enums that are useful in application code; not all enums are applicable to all diagrams.
#### Direction
Sets the direction of a diagram.
##### Cases
* BT - bottom to top
* LR - left to right
* RL - right to left
* TB - top to bottom

#### InteractionTarget
##### Cases
* Blank  - _blank
* Parent - _parent
* Self - _self
* Top - _top
}
#### InteractionType
##### Cases
* Callback
* Link