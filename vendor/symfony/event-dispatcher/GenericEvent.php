<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\EventDispatcher;

use Symfony\Contracts\EventDispatcher\Event;

/**
 * Event encapsulation class.
 *
 * Encapsulates events thus decoupling the observer from the subject they encapsulate.
 *
 * @author Drak <drak@zikula.org>
 *
 * @implements \ArrayAccess<string, mixed>
 * @implements \IteratorAggregate<string, mixed>
 */
class GenericEvent extends Event implements \ArrayAccess, \IteratorAggregate
{
    protected $subject;
    protected $arguments;

    /**
     * Encapsulate an event with $subject and $args.
     *
     * @param mixed $subject   The subject of the event, usually an object or a callable
     * @param array $arguments Arguments to store in the event
     */
<<<<<<< HEAD
    public function __construct($subject = null, array $arguments = [])
=======
    public function __construct(mixed $subject = null, array $arguments = [])
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->subject = $subject;
        $this->arguments = $arguments;
    }

    /**
     * Getter for subject property.
<<<<<<< HEAD
     *
     * @return mixed
     */
    public function getSubject()
=======
     */
    public function getSubject(): mixed
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->subject;
    }

    /**
     * Get argument by key.
     *
<<<<<<< HEAD
     * @return mixed
     *
     * @throws \InvalidArgumentException if key is not found
     */
    public function getArgument(string $key)
=======
     * @throws \InvalidArgumentException if key is not found
     */
    public function getArgument(string $key): mixed
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        if ($this->hasArgument($key)) {
            return $this->arguments[$key];
        }

        throw new \InvalidArgumentException(sprintf('Argument "%s" not found.', $key));
    }

    /**
     * Add argument to event.
     *
<<<<<<< HEAD
     * @param mixed $value Value
     *
     * @return $this
     */
    public function setArgument(string $key, $value)
=======
     * @return $this
     */
    public function setArgument(string $key, mixed $value): static
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->arguments[$key] = $value;

        return $this;
    }

    /**
     * Getter for all arguments.
<<<<<<< HEAD
     *
     * @return array
     */
    public function getArguments()
=======
     */
    public function getArguments(): array
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->arguments;
    }

    /**
     * Set args property.
     *
     * @return $this
     */
<<<<<<< HEAD
    public function setArguments(array $args = [])
=======
    public function setArguments(array $args = []): static
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->arguments = $args;

        return $this;
    }

    /**
     * Has argument.
<<<<<<< HEAD
     *
     * @return bool
     */
    public function hasArgument(string $key)
=======
     */
    public function hasArgument(string $key): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return \array_key_exists($key, $this->arguments);
    }

    /**
     * ArrayAccess for argument getter.
     *
     * @param string $key Array key
     *
<<<<<<< HEAD
     * @return mixed
     *
     * @throws \InvalidArgumentException if key does not exist in $this->args
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($key)
=======
     * @throws \InvalidArgumentException if key does not exist in $this->args
     */
    public function offsetGet(mixed $key): mixed
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->getArgument($key);
    }

    /**
     * ArrayAccess for argument setter.
     *
<<<<<<< HEAD
     * @param string $key   Array key to set
     * @param mixed  $value Value
     *
     * @return void
     */
    #[\ReturnTypeWillChange]
    public function offsetSet($key, $value)
=======
     * @param string $key Array key to set
     */
    public function offsetSet(mixed $key, mixed $value): void
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->setArgument($key, $value);
    }

    /**
     * ArrayAccess for unset argument.
     *
     * @param string $key Array key
<<<<<<< HEAD
     *
     * @return void
     */
    #[\ReturnTypeWillChange]
    public function offsetUnset($key)
=======
     */
    public function offsetUnset(mixed $key): void
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        if ($this->hasArgument($key)) {
            unset($this->arguments[$key]);
        }
    }

    /**
     * ArrayAccess has argument.
     *
     * @param string $key Array key
<<<<<<< HEAD
     *
     * @return bool
     */
    #[\ReturnTypeWillChange]
    public function offsetExists($key)
=======
     */
    public function offsetExists(mixed $key): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->hasArgument($key);
    }

    /**
     * IteratorAggregate for iterating over the object like an array.
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
        return new \ArrayIterator($this->arguments);
    }
}
