<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpFoundation;

/**
 * Represents an Accept-* header item.
 *
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class AcceptHeaderItem
{
<<<<<<< HEAD
    private $value;
    private $quality = 1.0;
    private $index = 0;
    private $attributes = [];
=======
    private string $value;
    private float $quality = 1.0;
    private int $index = 0;
    private array $attributes = [];
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    public function __construct(string $value, array $attributes = [])
    {
        $this->value = $value;
        foreach ($attributes as $name => $value) {
            $this->setAttribute($name, $value);
        }
    }

    /**
     * Builds an AcceptHeaderInstance instance from a string.
<<<<<<< HEAD
     *
     * @return self
     */
    public static function fromString(?string $itemValue)
=======
     */
    public static function fromString(?string $itemValue): self
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $parts = HeaderUtils::split($itemValue ?? '', ';=');

        $part = array_shift($parts);
        $attributes = HeaderUtils::combine($parts);

        return new self($part[0], $attributes);
    }

    /**
     * Returns header value's string representation.
<<<<<<< HEAD
     *
     * @return string
     */
    public function __toString()
=======
     */
    public function __toString(): string
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $string = $this->value.($this->quality < 1 ? ';q='.$this->quality : '');
        if (\count($this->attributes) > 0) {
            $string .= '; '.HeaderUtils::toString($this->attributes, ';');
        }

        return $string;
    }

    /**
     * Set the item value.
     *
     * @return $this
     */
<<<<<<< HEAD
    public function setValue(string $value)
=======
    public function setValue(string $value): static
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Returns the item value.
<<<<<<< HEAD
     *
     * @return string
     */
    public function getValue()
=======
     */
    public function getValue(): string
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->value;
    }

    /**
     * Set the item quality.
     *
     * @return $this
     */
<<<<<<< HEAD
    public function setQuality(float $quality)
=======
    public function setQuality(float $quality): static
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->quality = $quality;

        return $this;
    }

    /**
     * Returns the item quality.
<<<<<<< HEAD
     *
     * @return float
     */
    public function getQuality()
=======
     */
    public function getQuality(): float
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->quality;
    }

    /**
     * Set the item index.
     *
     * @return $this
     */
<<<<<<< HEAD
    public function setIndex(int $index)
=======
    public function setIndex(int $index): static
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->index = $index;

        return $this;
    }

    /**
     * Returns the item index.
<<<<<<< HEAD
     *
     * @return int
     */
    public function getIndex()
=======
     */
    public function getIndex(): int
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->index;
    }

    /**
     * Tests if an attribute exists.
<<<<<<< HEAD
     *
     * @return bool
     */
    public function hasAttribute(string $name)
=======
     */
    public function hasAttribute(string $name): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return isset($this->attributes[$name]);
    }

    /**
     * Returns an attribute by its name.
<<<<<<< HEAD
     *
     * @param mixed $default
     *
     * @return mixed
     */
    public function getAttribute(string $name, $default = null)
=======
     */
    public function getAttribute(string $name, mixed $default = null): mixed
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->attributes[$name] ?? $default;
    }

    /**
     * Returns all attributes.
<<<<<<< HEAD
     *
     * @return array
     */
    public function getAttributes()
=======
     */
    public function getAttributes(): array
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->attributes;
    }

    /**
     * Set an attribute.
     *
     * @return $this
     */
<<<<<<< HEAD
    public function setAttribute(string $name, string $value)
=======
    public function setAttribute(string $name, string $value): static
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        if ('q' === $name) {
            $this->quality = (float) $value;
        } else {
            $this->attributes[$name] = $value;
        }

        return $this;
    }
}
