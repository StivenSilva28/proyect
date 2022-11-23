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

/**
 * @author Nicolas Grekas <p@tchwork.com>
 *
 * @internal
 */
final class SessionBagProxy implements SessionBagInterface
{
<<<<<<< HEAD
    private $bag;
    private $data;
    private $usageIndex;
    private $usageReporter;
=======
    private SessionBagInterface $bag;
    private array $data;
    private ?int $usageIndex;
    private ?\Closure $usageReporter;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    public function __construct(SessionBagInterface $bag, array &$data, ?int &$usageIndex, ?callable $usageReporter)
    {
        $this->bag = $bag;
        $this->data = &$data;
        $this->usageIndex = &$usageIndex;
<<<<<<< HEAD
        $this->usageReporter = $usageReporter;
=======
        $this->usageReporter = null === $usageReporter ? null : $usageReporter(...);
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }

    public function getBag(): SessionBagInterface
    {
        ++$this->usageIndex;
        if ($this->usageReporter && 0 <= $this->usageIndex) {
            ($this->usageReporter)();
        }

        return $this->bag;
    }

    public function isEmpty(): bool
    {
        if (!isset($this->data[$this->bag->getStorageKey()])) {
            return true;
        }
        ++$this->usageIndex;
        if ($this->usageReporter && 0 <= $this->usageIndex) {
            ($this->usageReporter)();
        }

        return empty($this->data[$this->bag->getStorageKey()]);
    }

    /**
     * {@inheritdoc}
     */
    public function getName(): string
    {
        return $this->bag->getName();
    }

    /**
     * {@inheritdoc}
     */
    public function initialize(array &$array): void
    {
        ++$this->usageIndex;
        if ($this->usageReporter && 0 <= $this->usageIndex) {
            ($this->usageReporter)();
        }

        $this->data[$this->bag->getStorageKey()] = &$array;

        $this->bag->initialize($array);
    }

    /**
     * {@inheritdoc}
     */
    public function getStorageKey(): string
    {
        return $this->bag->getStorageKey();
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
        return $this->bag->clear();
    }
}
