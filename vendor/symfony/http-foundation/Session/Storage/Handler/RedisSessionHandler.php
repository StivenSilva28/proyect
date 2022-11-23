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

use Predis\Response\ErrorInterface;
use Symfony\Component\Cache\Traits\RedisClusterProxy;
use Symfony\Component\Cache\Traits\RedisProxy;

/**
 * Redis based session storage handler based on the Redis class
 * provided by the PHP redis extension.
 *
 * @author Dalibor Karlović <dalibor@flexolabs.io>
 */
class RedisSessionHandler extends AbstractSessionHandler
{
<<<<<<< HEAD
    private $redis;

    /**
     * @var string Key prefix for shared environments
     */
    private $prefix;

    /**
     * @var int Time to live in seconds
     */
    private $ttl;
=======
    private \Redis|\RedisArray|\RedisCluster|\Predis\ClientInterface|RedisProxy|RedisClusterProxy $redis;

    /**
     * Key prefix for shared environments.
     */
    private string $prefix;

    /**
     * Time to live in seconds.
     */
    private int|\Closure|null $ttl;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * List of available options:
     *  * prefix: The prefix to use for the keys in order to avoid collision on the Redis server
     *  * ttl: The time to live in seconds.
     *
<<<<<<< HEAD
     * @param \Redis|\RedisArray|\RedisCluster|\Predis\ClientInterface|RedisProxy|RedisClusterProxy $redis
     *
     * @throws \InvalidArgumentException When unsupported client or options are passed
     */
    public function __construct($redis, array $options = [])
    {
        if (
            !$redis instanceof \Redis &&
            !$redis instanceof \RedisArray &&
            !$redis instanceof \RedisCluster &&
            !$redis instanceof \Predis\ClientInterface &&
            !$redis instanceof RedisProxy &&
            !$redis instanceof RedisClusterProxy
        ) {
            throw new \InvalidArgumentException(sprintf('"%s()" expects parameter 1 to be Redis, RedisArray, RedisCluster or Predis\ClientInterface, "%s" given.', __METHOD__, get_debug_type($redis)));
        }

=======
     * @throws \InvalidArgumentException When unsupported client or options are passed
     */
    public function __construct(\Redis|\RedisArray|\RedisCluster|\Predis\ClientInterface|RedisProxy|RedisClusterProxy $redis, array $options = [])
    {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
        if ($diff = array_diff(array_keys($options), ['prefix', 'ttl'])) {
            throw new \InvalidArgumentException(sprintf('The following options are not supported "%s".', implode(', ', $diff)));
        }

        $this->redis = $redis;
        $this->prefix = $options['prefix'] ?? 'sf_s';
        $this->ttl = $options['ttl'] ?? null;
    }

    /**
     * {@inheritdoc}
     */
    protected function doRead(string $sessionId): string
    {
        return $this->redis->get($this->prefix.$sessionId) ?: '';
    }

    /**
     * {@inheritdoc}
     */
    protected function doWrite(string $sessionId, string $data): bool
    {
<<<<<<< HEAD
        $result = $this->redis->setEx($this->prefix.$sessionId, (int) ($this->ttl ?? \ini_get('session.gc_maxlifetime')), $data);
=======
        $ttl = ($this->ttl instanceof \Closure ? ($this->ttl)() : $this->ttl) ?? \ini_get('session.gc_maxlifetime');
        $result = $this->redis->setEx($this->prefix.$sessionId, (int) $ttl, $data);
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

        return $result && !$result instanceof ErrorInterface;
    }

    /**
     * {@inheritdoc}
     */
    protected function doDestroy(string $sessionId): bool
    {
        static $unlink = true;

        if ($unlink) {
            try {
                $unlink = false !== $this->redis->unlink($this->prefix.$sessionId);
<<<<<<< HEAD
            } catch (\Throwable $e) {
=======
            } catch (\Throwable) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
                $unlink = false;
            }
        }

        if (!$unlink) {
            $this->redis->del($this->prefix.$sessionId);
        }

        return true;
    }

    /**
     * {@inheritdoc}
     */
    #[\ReturnTypeWillChange]
    public function close(): bool
    {
        return true;
    }

<<<<<<< HEAD
    /**
     * {@inheritdoc}
     *
     * @return int|false
     */
    #[\ReturnTypeWillChange]
    public function gc($maxlifetime)
=======
    public function gc(int $maxlifetime): int|false
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return 0;
    }

<<<<<<< HEAD
    /**
     * @return bool
     */
    #[\ReturnTypeWillChange]
    public function updateTimestamp($sessionId, $data)
    {
        return (bool) $this->redis->expire($this->prefix.$sessionId, (int) ($this->ttl ?? \ini_get('session.gc_maxlifetime')));
=======
    public function updateTimestamp(string $sessionId, string $data): bool
    {
        $ttl = ($this->ttl instanceof \Closure ? ($this->ttl)() : $this->ttl) ?? \ini_get('session.gc_maxlifetime');

        return $this->redis->expire($this->prefix.$sessionId, (int) $ttl);
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }
}
