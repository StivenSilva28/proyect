<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpFoundation\Session\Flash;

/**
 * FlashBag flash message container.
 *
 * @author Drak <drak@zikula.org>
 */
class FlashBag implements FlashBagInterface
{
<<<<<<< HEAD
    private $name = 'flashes';
    private $flashes = [];
    private $storageKey;
=======
    private string $name = 'flashes';
    private array $flashes = [];
    private string $storageKey;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * @param string $storageKey The key used to store flashes in the session
     */
    public function __construct(string $storageKey = '_symfony_flashes')
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
    public function initialize(array &$flashes)
    {
        $this->flashes = &$flashes;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function add(string $type, $message)
=======
    public function add(string $type, mixed $message)
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->flashes[$type][] = $message;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function peek(string $type, array $default = [])
=======
    public function peek(string $type, array $default = []): array
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->has($type) ? $this->flashes[$type] : $default;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function peekAll()
=======
    public function peekAll(): array
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->flashes;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function get(string $type, array $default = [])
=======
    public function get(string $type, array $default = []): array
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        if (!$this->has($type)) {
            return $default;
        }

        $return = $this->flashes[$type];

        unset($this->flashes[$type]);

        return $return;
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
        $return = $this->peekAll();
        $this->flashes = [];

        return $return;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function set(string $type, $messages)
=======
    public function set(string $type, string|array $messages)
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->flashes[$type] = (array) $messages;
    }

    /**
     * {@inheritdoc}
     */
    public function setAll(array $messages)
    {
        $this->flashes = $messages;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function has(string $type)
=======
    public function has(string $type): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return \array_key_exists($type, $this->flashes) && $this->flashes[$type];
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function keys()
=======
    public function keys(): array
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return array_keys($this->flashes);
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
    public function clear()
=======
    public function clear(): mixed
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->all();
    }
}
