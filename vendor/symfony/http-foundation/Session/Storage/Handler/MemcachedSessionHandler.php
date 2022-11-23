<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpFoundation\Session\Storage\Handler;

/**
 * Memcached based session storage handler based on the Memcached class
 * provided by the PHP memcached extension.
 *
 * @see https://php.net/memcached
 *
 * @author Drak <drak@zikula.org>
 */
class MemcachedSessionHandler extends AbstractSessionHandler
{
<<<<<<< HEAD
    private $memcached;

    /**
     * @var int Time to live in seconds
     */
    private $ttl;

    /**
     * @var string Key prefix for shared environments
     */
    private $prefix;
=======
    private \Memcached $memcached;

    /**
     * Time to live in seconds.
     */
    private int|\Closure|null $ttl;

    /**
     * Key prefix for shared environments.
     */
    private string $prefix;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * Constructor.
     *
     * List of available options:
     *  * prefix: The prefix to use for the memcached keys in order to avoid collision
     *  * ttl: The time to live in seconds.
     *
     * @throws \InvalidArgumentException When unsupported options are passed
     */
    public function __construct(\Memcached $memcached, array $options = [])
    {
        $this->memcached = $memcached;

        if ($diff = array_diff(array_keys($options), ['prefix', 'expiretime', 'ttl'])) {
            throw new \InvalidArgumentException(sprintf('The following options are not supported "%s".', implode(', ', $diff)));
        }

        $this->ttl = $options['expiretime'] ?? $options['ttl'] ?? null;
        $this->prefix = $options['prefix'] ?? 'sf2s';
    }

<<<<<<< HEAD
    /**
     * @return bool
     */
    #[\ReturnTypeWillChange]
    public function close()
=======
    public function close(): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->memcached->quit();
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    protected function doRead(string $sessionId)
=======
    protected function doRead(string $sessionId): string
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->memcached->get($this->prefix.$sessionId) ?: '';
    }

<<<<<<< HEAD
    /**
     * @return bool
     */
    #[\ReturnTypeWillChange]
    public function updateTimestamp($sessionId, $data)
    {
        $this->memcached->touch($this->prefix.$sessionId, time() + (int) ($this->ttl ?? \ini_get('session.gc_maxlifetime')));
=======
    public function updateTimestamp(string $sessionId, string $data): bool
    {
        $ttl = ($this->ttl instanceof \Closure ? ($this->ttl)() : $this->ttl) ?? \ini_get('session.gc_maxlifetime');
        $this->memcached->touch($this->prefix.$sessionId, time() + (int) $ttl);
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

        return true;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    protected function doWrite(string $sessionId, string $data)
    {
        return $this->memcached->set($this->prefix.$sessionId, $data, time() + (int) ($this->ttl ?? \ini_get('session.gc_maxlifetime')));
=======
    protected function doWrite(string $sessionId, string $data): bool
    {
        $ttl = ($this->ttl instanceof \Closure ? ($this->ttl)() : $this->ttl) ?? \ini_get('session.gc_maxlifetime');

        return $this->memcached->set($this->prefix.$sessionId, $data, time() + (int) $ttl);
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    protected function doDestroy(string $sessionId)
=======
    protected function doDestroy(string $sessionId): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $result = $this->memcached->delete($this->prefix.$sessionId);

        return $result || \Memcached::RES_NOTFOUND == $this->memcached->getResultCode();
    }

<<<<<<< HEAD
    /**
     * @return int|false
     */
    #[\ReturnTypeWillChange]
    public function gc($maxlifetime)
=======
    public function gc(int $maxlifetime): int|false
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        // not required here because memcached will auto expire the records anyhow.
        return 0;
    }

    /**
     * Return a Memcached instance.
<<<<<<< HEAD
     *
     * @return \Memcached
     */
    protected function getMemcached()
=======
     */
    protected function getMemcached(): \Memcached
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->memcached;
    }
}
