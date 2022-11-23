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

use Symfony\Component\Cache\Marshaller\MarshallerInterface;

/**
 * @author Ahmed TAILOULOUTE <ahmed.tailouloute@gmail.com>
 */
class MarshallingSessionHandler implements \SessionHandlerInterface, \SessionUpdateTimestampHandlerInterface
{
<<<<<<< HEAD
    private $handler;
    private $marshaller;
=======
    private AbstractSessionHandler $handler;
    private MarshallerInterface $marshaller;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    public function __construct(AbstractSessionHandler $handler, MarshallerInterface $marshaller)
    {
        $this->handler = $handler;
        $this->marshaller = $marshaller;
    }

<<<<<<< HEAD
    /**
     * @return bool
     */
    #[\ReturnTypeWillChange]
    public function open($savePath, $name)
=======
    public function open(string $savePath, string $name): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->handler->open($savePath, $name);
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
     * @return string
     */
    #[\ReturnTypeWillChange]
    public function read($sessionId)
=======
    public function read(string $sessionId): string
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->marshaller->unmarshall($this->handler->read($sessionId));
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
        $failed = [];
        $marshalledData = $this->marshaller->marshall(['data' => $data], $failed);

        if (isset($failed['data'])) {
            return false;
        }

        return $this->handler->write($sessionId, $marshalledData['data']);
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
        return $this->handler->validateId($sessionId);
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
        return $this->handler->updateTimestamp($sessionId, $data);
    }
}
