<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\CacheClearer;

use Psr\Cache\CacheItemPoolInterface;

/**
 * @author Nicolas Grekas <p@tchwork.com>
 */
class Psr6CacheClearer implements CacheClearerInterface
{
<<<<<<< HEAD
    private $pools = [];
=======
    private array $pools = [];
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * @param array<string, CacheItemPoolInterface> $pools
     */
    public function __construct(array $pools = [])
    {
        $this->pools = $pools;
    }

<<<<<<< HEAD
    /**
     * @return bool
     */
    public function hasPool(string $name)
=======
    public function hasPool(string $name): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return isset($this->pools[$name]);
    }

    /**
<<<<<<< HEAD
     * @return CacheItemPoolInterface
     *
     * @throws \InvalidArgumentException If the cache pool with the given name does not exist
     */
    public function getPool(string $name)
=======
     * @throws \InvalidArgumentException If the cache pool with the given name does not exist
     */
    public function getPool(string $name): CacheItemPoolInterface
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        if (!$this->hasPool($name)) {
            throw new \InvalidArgumentException(sprintf('Cache pool not found: "%s".', $name));
        }

        return $this->pools[$name];
    }

    /**
<<<<<<< HEAD
     * @return bool
     *
     * @throws \InvalidArgumentException If the cache pool with the given name does not exist
     */
    public function clearPool(string $name)
=======
     * @throws \InvalidArgumentException If the cache pool with the given name does not exist
     */
    public function clearPool(string $name): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        if (!isset($this->pools[$name])) {
            throw new \InvalidArgumentException(sprintf('Cache pool not found: "%s".', $name));
        }

        return $this->pools[$name]->clear();
    }

    /**
     * {@inheritdoc}
     */
    public function clear(string $cacheDir)
    {
        foreach ($this->pools as $pool) {
            $pool->clear();
        }
    }
}
