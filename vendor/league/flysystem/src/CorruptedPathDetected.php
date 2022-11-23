<?php

namespace League\Flysystem;

<<<<<<< HEAD
use LogicException;

class CorruptedPathDetected extends LogicException implements FilesystemException
{
    /**
     * @param string $path
     * @return CorruptedPathDetected
     */
    public static function forPath($path)
=======
use RuntimeException;

final class CorruptedPathDetected extends RuntimeException implements FilesystemException
{
    public static function forPath(string $path): CorruptedPathDetected
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return new CorruptedPathDetected("Corrupted path detected: " . $path);
    }
}
