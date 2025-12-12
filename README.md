# Mermaid
PHP for the [Mermaid.js](https://mermaid.js.org/) diagramming and charting tool.

For licence information see the [LICENSE](LICENSE.md) file.

## Installation
This package is a dependency of, and so installed with, the various Mermaid charts and diagrams.

## Usage
Call ```Mermaid::create(DiagramName::class)``` to get an instance of a diagram.

If creating a diagram that is in the ```BeastBytes\Mermaid``` namespace it can be created using the digram name.
For example, ```Mermaid::create(Flowchart::class)``` and ```Mermaid::create('Flowchart')```
both return an instance of BeastBytes\Mermaid\Flowchart.

```Mermaid::create()``` accepts an optional second argument;
an associative array that specifies the [Frontmatter](https://mermaid.js.org/config/configuration.html) for the diagram.
For example ```Mermaid::create('Flowchart', ['title' => 'Example Flowchart])``` specifies the title.

Configure the diagram as required - see the documentation for the diagram type for details,
then call the diagram's ```render()``` method.