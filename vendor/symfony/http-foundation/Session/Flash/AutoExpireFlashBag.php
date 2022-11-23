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
 * AutoExpireFlashBag flash message container.
 *
 * @author Drak <drak@zikula.org>
 */
class AutoExpireFlashBag implements FlashBagInterface
{
<<<<<<< HEAD
    private $name = 'flashes';
    private $flashes = ['display' => [], 'new' => []];
    private $storageKey;
=======
    private string $name = 'flashes';
    private array $flashes = ['display' => [], 'new' => []];
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

        // The logic: messages from the last request will be stored in new, so we move them to previous
        // This request we will show what is in 'display'.  What is placed into 'new' this time round will
        // be moved to display next time round.
        $this->flashes['display'] = \array_key_exists('new', $this->flashes) ? $this->flashes['new'] : [];
        $this->flashes['new'] = [];
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
        $this->flashes['new'][$type][] = $message;
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
        return $this->has($type) ? $this->flashes['display'][$type] : $default;
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
        return \array_key_exists('display', $this->flashes) ? $this->flashes['display'] : [];
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
        $return = $default;

        if (!$this->has($type)) {
            return $return;
        }

        if (isset($this->flashes['display'][$type])) {
            $return = $this->flashes['display'][$type];
            unset($this->flashes['display'][$type]);
        }

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
        $return = $this->flashes['display'];
        $this->flashes['display'] = [];

        return $return;
    }

    /**
     * {@inheritdoc}
     */
    public function setAll(array $messages)
    {
        $this->flashes['new'] = $messages;
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
        $this->flashes['new'][$type] = (array) $messages;
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
        return \array_key_exists($type, $this->flashes['display']) && $this->flashes['display'][$type];
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
        return array_keys($this->flashes['display']);
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
