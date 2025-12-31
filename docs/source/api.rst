API
===
Classes
-------

.. php:class:: Diagram

  Abstract base class for all Mermaid charts and diagrams

  .. php:method:: render(array $attributes = [])

    Renders a Mermaid chart or diagram

    :param array $attributes: HTML attributes for the <pre> tag as name=>value pairs
    .. note:: The `mermaid` class is added
    :returns: A Mermaid chart or diagram code in a <pre> tag
    :rtype: string


.. php:class:: Mermaid

  Static helper functions

  .. php:staticmethod:: create(string $diagram, array $frontmatter = [])

    Creates an instance of a Mermaid chart or diagram

    :param string $diagram: The chart/diagram class name
    :param array $frontmatter: Chart/Diagram frontmatter configuration as name=>value pairs
    :returns: A Mermaid chart or diagram instance
    :rtype: Diagram

  .. php:staticmethod:: getId()

    :returns: Returns the ID of an object. Used internally and typically not needed by application code
    :rtype: string

  .. php:staticmethod:: js(?array $config = null)

    :param array $config: Mermaid initialisation configuration as name=>value pairs
    :returns: Returns the JavaScript Mermaid import and initialisation code
    :rtype: string

  .. php:staticmethod:: scriptTag(?array $config = null)

    :param array $config: Mermaid initialisation configuration as name=>value pairs
    :returns: Returns the JavaScript Mermaid import and initialisation code in a <script> tag
    :rtype: string

Enums
-----

.. php:enum:: Direction : string

  Chart/Diagram direction

  .. php:case:: bottomTop : 'BT'

    Bottom to top

  .. php:case:: leftRight : 'LR'

    Left to right

  .. php:case:: rightLeft : 'RL'

    Right to left

  .. php:case:: topBottom : 'TB'

    Top to bottom

.. php:enum:: InteractionTarget : string

  Interaction target

  .. php:case:: blank : '_blank'
  .. php:case:: parent : '_parent'
  .. php:case:: self : '_self'
  .. php:case:: top : '_top'

.. php:enum:: InteractionType : string

  Interaction type

  .. php:case:: callback : 'call'
  .. php:case:: link : 'href'