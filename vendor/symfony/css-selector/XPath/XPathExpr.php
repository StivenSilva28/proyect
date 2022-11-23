<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\CssSelector\XPath;

/**
 * XPath expression translator interface.
 *
 * This component is a port of the Python cssselect library,
 * which is copyright Ian Bicking, @see https://github.com/SimonSapin/cssselect.
 *
 * @author Jean-François Simon <jeanfrancois.simon@sensiolabs.com>
 *
 * @internal
 */
class XPathExpr
{
<<<<<<< HEAD
    private $path;
    private $element;
    private $condition;
=======
    private string $path;
    private string $element;
    private string $condition;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    public function __construct(string $path = '', string $element = '*', string $condition = '', bool $starPrefix = false)
    {
        $this->path = $path;
        $this->element = $element;
        $this->condition = $condition;

        if ($starPrefix) {
            $this->addStarPrefix();
        }
    }

    public function getElement(): string
    {
        return $this->element;
    }

    /**
     * @return $this
     */
<<<<<<< HEAD
    public function addCondition(string $condition): self
=======
    public function addCondition(string $condition): static
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->condition = $this->condition ? sprintf('(%s) and (%s)', $this->condition, $condition) : $condition;

        return $this;
    }

    public function getCondition(): string
    {
        return $this->condition;
    }

    /**
     * @return $this
     */
<<<<<<< HEAD
    public function addNameTest(): self
=======
    public function addNameTest(): static
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        if ('*' !== $this->element) {
            $this->addCondition('name() = '.Translator::getXpathLiteral($this->element));
            $this->element = '*';
        }

        return $this;
    }

    /**
     * @return $this
     */
<<<<<<< HEAD
    public function addStarPrefix(): self
=======
    public function addStarPrefix(): static
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->path .= '*/';

        return $this;
    }

    /**
     * Joins another XPathExpr with a combiner.
     *
     * @return $this
     */
<<<<<<< HEAD
    public function join(string $combiner, self $expr): self
=======
    public function join(string $combiner, self $expr): static
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $path = $this->__toString().$combiner;

        if ('*/' !== $expr->path) {
            $path .= $expr->path;
        }

        $this->path = $path;
        $this->element = $expr->element;
        $this->condition = $expr->condition;

        return $this;
    }

    public function __toString(): string
    {
        $path = $this->path.$this->element;
        $condition = null === $this->condition || '' === $this->condition ? '' : '['.$this->condition.']';

        return $path.$condition;
    }
}
