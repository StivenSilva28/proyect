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

/**
 * A read-only proxy for an event dispatcher.
 *
 * @author Bernhard Schussek <bschussek@gmail.com>
 */
class ImmutableEventDispatcher implements EventDispatcherInterface
{
<<<<<<< HEAD
    private $dispatcher;
=======
    private EventDispatcherInterface $dispatcher;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    public function __construct(EventDispatcherInterface $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    /**
     * {@inheritdoc}
     */
    public function dispatch(object $event, string $eventName = null): object
    {
        return $this->dispatcher->dispatch($event, $eventName);
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function addListener(string $eventName, $listener, int $priority = 0)
=======
    public function addListener(string $eventName, callable|array $listener, int $priority = 0)
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        throw new \BadMethodCallException('Unmodifiable event dispatchers must not be modified.');
    }

    /**
     * {@inheritdoc}
     */
    public function addSubscriber(EventSubscriberInterface $subscriber)
    {
        throw new \BadMethodCallException('Unmodifiable event dispatchers must not be modified.');
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function removeListener(string $eventName, $listener)
=======
    public function removeListener(string $eventName, callable|array $listener)
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        throw new \BadMethodCallException('Unmodifiable event dispatchers must not be modified.');
    }

    /**
     * {@inheritdoc}
     */
    public function removeSubscriber(EventSubscriberInterface $subscriber)
    {
        throw new \BadMethodCallException('Unmodifiable event dispatchers must not be modified.');
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function getListeners(string $eventName = null)
=======
    public function getListeners(string $eventName = null): array
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->dispatcher->getListeners($eventName);
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function getListenerPriority(string $eventName, $listener)
=======
    public function getListenerPriority(string $eventName, callable|array $listener): ?int
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->dispatcher->getListenerPriority($eventName, $listener);
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function hasListeners(string $eventName = null)
=======
    public function hasListeners(string $eventName = null): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->dispatcher->hasListeners($eventName);
    }
}
