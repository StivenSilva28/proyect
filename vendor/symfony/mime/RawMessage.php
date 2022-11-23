<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Mime;

use Symfony\Component\Mime\Exception\LogicException;

/**
 * @author Fabien Potencier <fabien@symfony.com>
 */
<<<<<<< HEAD
class RawMessage implements \Serializable
{
    private $message;

    /**
     * @param iterable|string $message
     */
    public function __construct($message)
=======
class RawMessage
{
    private $message;

    public function __construct(iterable|string $message)
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->message = $message;
    }

    public function toString(): string
    {
        if (\is_string($this->message)) {
            return $this->message;
        }
        if ($this->message instanceof \Traversable) {
            $this->message = iterator_to_array($this->message, false);
        }

        return $this->message = implode('', $this->message);
    }

    public function toIterable(): iterable
    {
        if (\is_string($this->message)) {
            yield $this->message;

            return;
        }

        $message = '';
        foreach ($this->message as $chunk) {
            $message .= $chunk;
            yield $chunk;
        }
        $this->message = $message;
    }

    /**
     * @throws LogicException if the message is not valid
     */
    public function ensureValidity()
    {
    }

<<<<<<< HEAD
    /**
     * @internal
     */
    final public function serialize(): string
    {
        return serialize($this->__serialize());
    }

    /**
     * @internal
     */
    final public function unserialize($serialized)
    {
        $this->__unserialize(unserialize($serialized));
    }

=======
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    public function __serialize(): array
    {
        return [$this->toString()];
    }

    public function __unserialize(array $data): void
    {
        [$this->message] = $data;
    }
}