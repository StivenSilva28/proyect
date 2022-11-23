<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpFoundation\Session\Attribute;

/**
 * This class relates to session attribute storage.
 *
 * @implements \IteratorAggregate<string, mixed>
 */
class AttributeBag implements AttributeBagInterface, \IteratorAggregate, \Countable
{
<<<<<<< HEAD
    private $name = 'attributes';
    private $storageKey;
=======
    private string $name = 'attributes';
    private string $storageKey;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    protected $attributes = [];

    /**
     * @param string $storageKey The key used to store attributes in the session
     */
    public function __construct(string $storageKey = '_sf2_attributes')
    {
        $this->storageKey = $storageKey;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function getName()
=======
    public function getName(): string
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * {@inheritdoc}
     */
    public function initialize(array &$attributes)
    {
        $this->attributes = &$attributes;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function getStorageKey()
=======
    public function getStorageKey(): string
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->storageKey;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function has(string $name)
=======
    public function has(string $name): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return \array_key_exists($name, $this->attributes);
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function get(string $name, $default = null)
=======
    public function get(string $name, mixed $default = null): mixed
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return \array_key_exists($name, $this->attributes) ? $this->attributes[$name] : $default;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function set(string $name, $value)
=======
    public function set(string $name, mixed $value)
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->attributes[$name] = $value;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function all()
=======
    public function all(): array
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->attributes;
    }

    /**
     * {@inheritdoc}
     */
    public function replace(array $attributes)
    {
        $this->attributes = [];
        foreach ($attributes as $key => $value) {
            $this->set($key, $value);
        }
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function remove(string $name)
=======
    public function remove(string $name): mixed
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $retval = null;
        if (\array_key_exists($name, $this->attributes)) {
            $retval = $this->attributes[$name];
            unset($this->attributes[$name]);
        }

        return $retval;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function clear()
=======
    public function clear(): mixed
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $return = $this->attributes;
        $this->attributes = [];

        return $return;
    }

    /**
     * Returns an iterator for attributes.
     *
     * @return \ArrayIterator<string, mixed>
     */
<<<<<<< HEAD
    #[\ReturnTypeWillChange]
    public function getIterator()
=======
    public function getIterator(): \ArrayIterator
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return new \ArrayIterator($this->attributes);
    }

    /**
     * Returns the number of attributes.
<<<<<<< HEAD
     *
     * @return int
     */
    #[\ReturnTypeWillChange]
    public function count()
=======
     */
    public function count(): int
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return \count($this->attributes);
    }
}
