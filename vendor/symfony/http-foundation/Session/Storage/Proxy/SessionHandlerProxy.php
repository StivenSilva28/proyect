<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpFoundation\Session\Storage\Proxy;

use Symfony\Component\HttpFoundation\Session\Storage\Handler\StrictSessionHandler;

/**
 * @author Drak <drak@zikula.org>
 */
class SessionHandlerProxy extends AbstractProxy implements \SessionHandlerInterface, \SessionUpdateTimestampHandlerInterface
{
    protected $handler;

    public function __construct(\SessionHandlerInterface $handler)
    {
        $this->handler = $handler;
        $this->wrapper = $handler instanceof \SessionHandler;
        $this->saveHandlerName = $this->wrapper || ($handler instanceof StrictSessionHandler && $handler->isWrapper()) ? \ini_get('session.save_handler') : 'user';
    }

<<<<<<< HEAD
    /**
     * @return \SessionHandlerInterface
     */
    public function getHandler()
=======
    public function getHandler(): \SessionHandlerInterface
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->handler;
    }

    // \SessionHandlerInterface

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
        return $this->handler->open($savePath, $sessionName);
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
     * @return string|false
     */
    #[\ReturnTypeWillChange]
    public function read($sessionId)
=======
    public function read(string $sessionId): string|false
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->handler->read($sessionId);
    }

<<<<<<< HEAD
    /**
     * @return bool
     */
    #[\ReturnTypeWillChange]
    public function write($sessionId, $data)
=======
    public function write(string $sessionId, string $data): bool
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
        return $this->handler->destroy($sessionId);
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

<<<<<<< HEAD
    /**
     * @return bool
     */
    #[\ReturnTypeWillChange]
    public function validateId($sessionId)
=======
    public function validateId(string $sessionId): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return !$this->handler instanceof \SessionUpdateTimestampHandlerInterface || $this->handler->validateId($sessionId);
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
        return $this->handler instanceof \SessionUpdateTimestampHandlerInterface ? $this->handler->updateTimestamp($sessionId, $data) : $this->write($sessionId, $data);
    }
}
