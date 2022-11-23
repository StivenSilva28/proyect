<?php

namespace Illuminate\Session;

use SessionHandlerInterface;

class NullSessionHandler implements SessionHandlerInterface
{
    /**
     * {@inheritdoc}
     *
     * @return bool
     */
<<<<<<< HEAD
    #[\ReturnTypeWillChange]
    public function open($savePath, $sessionName)
=======
    public function open($savePath, $sessionName): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return true;
    }

    /**
     * {@inheritdoc}
     *
     * @return bool
     */
<<<<<<< HEAD
    #[\ReturnTypeWillChange]
    public function close()
=======
    public function close(): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return true;
    }

    /**
     * {@inheritdoc}
     *
<<<<<<< HEAD
     * @return string|false
     */
    #[\ReturnTypeWillChange]
    public function read($sessionId)
=======
     * @return string
     */
    public function read($sessionId): string
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return '';
    }

    /**
     * {@inheritdoc}
     *
     * @return bool
     */
<<<<<<< HEAD
    #[\ReturnTypeWillChange]
    public function write($sessionId, $data)
=======
    public function write($sessionId, $data): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return true;
    }

    /**
     * {@inheritdoc}
     *
     * @return bool
     */
<<<<<<< HEAD
    #[\ReturnTypeWillChange]
    public function destroy($sessionId)
=======
    public function destroy($sessionId): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return true;
    }

    /**
     * {@inheritdoc}
     *
<<<<<<< HEAD
     * @return int|false
     */
    #[\ReturnTypeWillChange]
    public function gc($lifetime)
    {
        return true;
=======
     * @return int
     */
    public function gc($lifetime): int
    {
        return 0;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }
}
