<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpFoundation\Session\Storage;

use Symfony\Component\HttpFoundation\Session\SessionBagInterface;

/**
 * MockArraySessionStorage mocks the session for unit tests.
 *
 * No PHP session is actually started since a session can be initialized
 * and shutdown only once per PHP execution cycle.
 *
 * When doing functional testing, you should use MockFileSessionStorage instead.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 * @author Bulat Shakirzyanov <mallluhuct@gmail.com>
 * @author Drak <drak@zikula.org>
 */
class MockArraySessionStorage implements SessionStorageInterface
{
    /**
     * @var string
     */
    protected $id = '';

    /**
     * @var string
     */
    protected $name;

    /**
     * @var bool
     */
    protected $started = false;

    /**
     * @var bool
     */
    protected $closed = false;

    /**
     * @var array
     */
    protected $data = [];

    /**
     * @var MetadataBag
     */
    protected $metadataBag;

    /**
     * @var array|SessionBagInterface[]
     */
    protected $bags = [];

    public function __construct(string $name = 'MOCKSESSID', MetadataBag $metaBag = null)
    {
        $this->name = $name;
        $this->setMetadataBag($metaBag);
    }

    public function setSessionData(array $array)
    {
        $this->data = $array;
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
        if ($this->started) {
            return true;
        }

        if (empty($this->id)) {
            $this->id = $this->generateId();
        }

        $this->loadSession();

        return true;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function regenerate(bool $destroy = false, int $lifetime = null)
=======
    public function regenerate(bool $destroy = false, int $lifetime = null): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        if (!$this->started) {
            $this->start();
        }

        $this->metadataBag->stampNew($lifetime);
        $this->id = $this->generateId();

        return true;
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
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function setId(string $id)
    {
        if ($this->started) {
            throw new \LogicException('Cannot set session ID after the session has started.');
        }

        $this->id = $id;
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

    /**
     * {@inheritdoc}
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * {@inheritdoc}
     */
    public function save()
    {
        if (!$this->started || $this->closed) {
            throw new \RuntimeException('Trying to save a session that was not started yet or was already closed.');
        }
        // nothing to do since we don't persist the session data
        $this->closed = false;
        $this->started = false;
    }

    /**
     * {@inheritdoc}
     */
    public function clear()
    {
        // clear out the bags
        foreach ($this->bags as $bag) {
            $bag->clear();
        }

        // clear out the session
        $this->data = [];

        // reconnect the bags to the session
        $this->loadSession();
    }

    /**
     * {@inheritdoc}
     */
    public function registerBag(SessionBagInterface $bag)
    {
        $this->bags[$bag->getName()] = $bag;
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
        if (!isset($this->bags[$name])) {
            throw new \InvalidArgumentException(sprintf('The SessionBagInterface "%s" is not registered.', $name));
        }

        if (!$this->started) {
            $this->start();
        }

        return $this->bags[$name];
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
        return $this->started;
    }

    public function setMetadataBag(MetadataBag $bag = null)
    {
        if (null === $bag) {
            $bag = new MetadataBag();
        }

        $this->metadataBag = $bag;
    }

    /**
     * Gets the MetadataBag.
<<<<<<< HEAD
     *
     * @return MetadataBag
     */
    public function getMetadataBag()
=======
     */
    public function getMetadataBag(): MetadataBag
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->metadataBag;
    }

    /**
     * Generates a session ID.
     *
     * This doesn't need to be particularly cryptographically secure since this is just
     * a mock.
<<<<<<< HEAD
     *
     * @return string
     */
    protected function generateId()
=======
     */
    protected function generateId(): string
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return hash('sha256', uniqid('ss_mock_', true));
    }

    protected function loadSession()
    {
        $bags = array_merge($this->bags, [$this->metadataBag]);

        foreach ($bags as $bag) {
            $key = $bag->getStorageKey();
            $this->data[$key] = $this->data[$key] ?? [];
            $bag->initialize($this->data[$key]);
        }

        $this->started = true;
        $this->closed = false;
    }
}