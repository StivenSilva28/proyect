<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpFoundation\Session;

use Symfony\Component\HttpFoundation\Session\Attribute\AttributeBag;
use Symfony\Component\HttpFoundation\Session\Attribute\AttributeBagInterface;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
<<<<<<< HEAD
=======
use Symfony\Component\HttpFoundation\Session\Storage\MetadataBag;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
use Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage;
use Symfony\Component\HttpFoundation\Session\Storage\SessionStorageInterface;

// Help opcache.preload discover always-needed symbols
class_exists(AttributeBag::class);
class_exists(FlashBag::class);
class_exists(SessionBagProxy::class);

/**
 * @author Fabien Potencier <fabien@symfony.com>
 * @author Drak <drak@zikula.org>
 *
 * @implements \IteratorAggregate<string, mixed>
 */
class Session implements SessionInterface, \IteratorAggregate, \Countable
{
    protected $storage;

<<<<<<< HEAD
    private $flashName;
    private $attributeName;
    private $data = [];
    private $usageIndex = 0;
    private $usageReporter;
=======
    private string $flashName;
    private string $attributeName;
    private array $data = [];
    private int $usageIndex = 0;
    private ?\Closure $usageReporter;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    public function __construct(SessionStorageInterface $storage = null, AttributeBagInterface $attributes = null, FlashBagInterface $flashes = null, callable $usageReporter = null)
    {
        $this->storage = $storage ?? new NativeSessionStorage();
<<<<<<< HEAD
        $this->usageReporter = $usageReporter;

        $attributes = $attributes ?? new AttributeBag();
        $this->attributeName = $attributes->getName();
        $this->registerBag($attributes);

        $flashes = $flashes ?? new FlashBag();
=======
        $this->usageReporter = null === $usageReporter ? null : $usageReporter(...);

        $attributes ??= new AttributeBag();
        $this->attributeName = $attributes->getName();
        $this->registerBag($attributes);

        $flashes ??= new FlashBag();
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
        $this->flashName = $flashes->getName();
        $this->registerBag($flashes);
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function start()
=======
    public function start(): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->storage->start();
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
        return $this->getAttributeBag()->has($name);
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
        return $this->getAttributeBag()->get($name, $default);
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
        $this->getAttributeBag()->set($name, $value);
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
        return $this->getAttributeBag()->all();
    }

    /**
     * {@inheritdoc}
     */
    public function replace(array $attributes)
    {
        $this->getAttributeBag()->replace($attributes);
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
        return $this->getAttributeBag()->remove($name);
    }

    /**
     * {@inheritdoc}
     */
    public function clear()
    {
        $this->getAttributeBag()->clear();
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function isStarted()
=======
    public function isStarted(): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->storage->isStarted();
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
        return new \ArrayIterator($this->getAttributeBag()->all());
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
        return \count($this->getAttributeBag()->all());
    }

    public function &getUsageIndex(): int
    {
        return $this->usageIndex;
    }

    /**
     * @internal
     */
    public function isEmpty(): bool
    {
        if ($this->isStarted()) {
            ++$this->usageIndex;
            if ($this->usageReporter && 0 <= $this->usageIndex) {
                ($this->usageReporter)();
            }
        }
        foreach ($this->data as &$data) {
            if (!empty($data)) {
                return false;
            }
        }

        return true;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function invalidate(int $lifetime = null)
=======
    public function invalidate(int $lifetime = null): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->storage->clear();

        return $this->migrate(true, $lifetime);
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function migrate(bool $destroy = false, int $lifetime = null)
=======
    public function migrate(bool $destroy = false, int $lifetime = null): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->storage->regenerate($destroy, $lifetime);
    }

    /**
     * {@inheritdoc}
     */
    public function save()
    {
        $this->storage->save();
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function getId()
=======
    public function getId(): string
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->storage->getId();
    }

    /**
     * {@inheritdoc}
     */
    public function setId(string $id)
    {
        if ($this->storage->getId() !== $id) {
            $this->storage->setId($id);
        }
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
        return $this->storage->getName();
    }

    /**
     * {@inheritdoc}
     */
    public function setName(string $name)
    {
        $this->storage->setName($name);
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function getMetadataBag()
=======
    public function getMetadataBag(): MetadataBag
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        ++$this->usageIndex;
        if ($this->usageReporter && 0 <= $this->usageIndex) {
            ($this->usageReporter)();
        }

        return $this->storage->getMetadataBag();
    }

    /**
     * {@inheritdoc}
     */
    public function registerBag(SessionBagInterface $bag)
    {
        $this->storage->registerBag(new SessionBagProxy($bag, $this->data, $this->usageIndex, $this->usageReporter));
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function getBag(string $name)
=======
    public function getBag(string $name): SessionBagInterface
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $bag = $this->storage->getBag($name);

        return method_exists($bag, 'getBag') ? $bag->getBag() : $bag;
    }

    /**
     * Gets the flashbag interface.
<<<<<<< HEAD
     *
     * @return FlashBagInterface
     */
    public function getFlashBag()
=======
     */
    public function getFlashBag(): FlashBagInterface
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->getBag($this->flashName);
    }

    /**
     * Gets the attributebag interface.
     *
     * Note that this method was added to help with IDE autocompletion.
     */
    private function getAttributeBag(): AttributeBagInterface
    {
        return $this->getBag($this->attributeName);
    }
}
