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
 * Adds basic `SessionUpdateTimestampHandlerInterface` behaviors to another `SessionHandlerInterface`.
 *
 * @author Nicolas Grekas <p@tchwork.com>
 */
class StrictSessionHandler extends AbstractSessionHandler
{
<<<<<<< HEAD
    private $handler;
    private $doDestroy;
=======
    private \SessionHandlerInterface $handler;
    private bool $doDestroy;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    public function __construct(\SessionHandlerInterface $handler)
    {
        if ($handler instanceof \SessionUpdateTimestampHandlerInterface) {
            throw new \LogicException(sprintf('"%s" is already an instance of "SessionUpdateTimestampHandlerInterface", you cannot wrap it with "%s".', get_debug_type($handler), self::class));
        }

        $this->handler = $handler;
    }

    /**
     * Returns true if this handler wraps an internal PHP session save handler using \SessionHandler.
     *
     * @internal
     */
    public function isWrapper(): bool
    {
        return $this->handler instanceof \SessionHandler;
    }

<<<<<<< HEAD
    /**
     * @return bool
     */
    #[\ReturnTypeWillChange]
    public function open($savePath, $sessionName)
=======
    public function open(string $savePath, string $sessionName): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        parent::open($savePath, $sessionName);

        return $this->handler->open($savePath, $sessionName);
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
        return $this->handler->read($sessionId);
    }

<<<<<<< HEAD
    /**
     * @return bool
     */
    #[\ReturnTypeWillChange]
    public function updateTimestamp($sessionId, $data)
=======
    public function updateTimestamp(string $sessionId, string $data): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->write($sessionId, $data);
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    protected function doWrite(string $sessionId, string $data)
=======
    protected function doWrite(string $sessionId, string $data): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->handler->write($sessionId, $data);
    }

<<<<<<< HEAD
    /**
     * @return bool
     */
    #[\ReturnTypeWillChange]
    public function destroy($sessionId)
=======
    public function destroy(string $sessionId): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->doDestroy = true;
        $destroyed = parent::destroy($sessionId);

        return $this->doDestroy ? $this->doDestroy($sessionId) : $destroyed;
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
        $this->doDestroy = false;

        return $this->handler->destroy($sessionId);
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
        return $this->handler->close();
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
        return $this->handler->gc($maxlifetime);
    }
}
