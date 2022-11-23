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
 * Can be used in unit testing or in a situations where persisted sessions are not desired.
 *
 * @author Drak <drak@zikula.org>
 */
class NullSessionHandler extends AbstractSessionHandler
{
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
        return true;
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
        return true;
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
        return '';
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
        return true;
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
        return true;
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
        return true;
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
        return 0;
    }
}
