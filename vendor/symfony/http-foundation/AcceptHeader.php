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

// Help opcache.preload discover always-needed symbols
class_exists(AcceptHeaderItem::class);

/**
 * Represents an Accept-* header.
 *
 * An accept header is compound with a list of items,
 * sorted by descending quality.
 *
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class AcceptHeader
{
    /**
     * @var AcceptHeaderItem[]
     */
<<<<<<< HEAD
    private $items = [];

    /**
     * @var bool
     */
    private $sorted = true;
=======
    private array $items = [];

    private bool $sorted = true;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * @param AcceptHeaderItem[] $items
     */
    public function __construct(array $items)
    {
        foreach ($items as $item) {
            $this->add($item);
        }
    }

    /**
     * Builds an AcceptHeader instance from a string.
<<<<<<< HEAD
     *
     * @return self
     */
    public static function fromString(?string $headerValue)
=======
     */
    public static function fromString(?string $headerValue): self
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $index = 0;

        $parts = HeaderUtils::split($headerValue ?? '', ',;=');

        return new self(array_map(function ($subParts) use (&$index) {
            $part = array_shift($subParts);
            $attributes = HeaderUtils::combine($subParts);

            $item = new AcceptHeaderItem($part[0], $attributes);
            $item->setIndex($index++);

            return $item;
        }, $parts));
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
        return implode(',', $this->items);
    }

    /**
     * Tests if header has given value.
<<<<<<< HEAD
     *
     * @return bool
     */
    public function has(string $value)
=======
     */
    public function has(string $value): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return isset($this->items[$value]);
    }

    /**
     * Returns given value's item, if exists.
<<<<<<< HEAD
     *
     * @return AcceptHeaderItem|null
     */
    public function get(string $value)
=======
     */
    public function get(string $value): ?AcceptHeaderItem
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->items[$value] ?? $this->items[explode('/', $value)[0].'/*'] ?? $this->items['*/*'] ?? $this->items['*'] ?? null;
    }

    /**
     * Adds an item.
     *
     * @return $this
     */
<<<<<<< HEAD
    public function add(AcceptHeaderItem $item)
=======
    public function add(AcceptHeaderItem $item): static
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->items[$item->getValue()] = $item;
        $this->sorted = false;

        return $this;
    }

    /**
     * Returns all items.
     *
     * @return AcceptHeaderItem[]
     */
<<<<<<< HEAD
    public function all()
=======
    public function all(): array
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->sort();

        return $this->items;
    }

    /**
     * Filters items on their value using given regex.
<<<<<<< HEAD
     *
     * @return self
     */
    public function filter(string $pattern)
=======
     */
    public function filter(string $pattern): self
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return new self(array_filter($this->items, function (AcceptHeaderItem $item) use ($pattern) {
            return preg_match($pattern, $item->getValue());
        }));
    }

    /**
     * Returns first item.
<<<<<<< HEAD
     *
     * @return AcceptHeaderItem|null
     */
    public function first()
=======
     */
    public function first(): ?AcceptHeaderItem
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->sort();

        return !empty($this->items) ? reset($this->items) : null;
    }

    /**
     * Sorts items by descending quality.
     */
    private function sort(): void
    {
        if (!$this->sorted) {
            uasort($this->items, function (AcceptHeaderItem $a, AcceptHeaderItem $b) {
                $qA = $a->getQuality();
                $qB = $b->getQuality();

                if ($qA === $qB) {
                    return $a->getIndex() > $b->getIndex() ? 1 : -1;
                }

                return $qA > $qB ? -1 : 1;
            });

            $this->sorted = true;
        }
    }
}
