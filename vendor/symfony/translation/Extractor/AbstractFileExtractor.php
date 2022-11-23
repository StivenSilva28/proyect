<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Translation\Extractor;

use Symfony\Component\Translation\Exception\InvalidArgumentException;

/**
 * Base class used by classes that extract translation messages from files.
 *
 * @author Marcos D. Sánchez <marcosdsanchez@gmail.com>
 */
abstract class AbstractFileExtractor
{
<<<<<<< HEAD
    /**
     * @param string|iterable $resource Files, a file or a directory
     *
     * @return iterable
     */
    protected function extractFiles($resource)
=======
    protected function extractFiles(string|iterable $resource): iterable
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        if (is_iterable($resource)) {
            $files = [];
            foreach ($resource as $file) {
                if ($this->canBeExtracted($file)) {
                    $files[] = $this->toSplFileInfo($file);
                }
            }
        } elseif (is_file($resource)) {
            $files = $this->canBeExtracted($resource) ? [$this->toSplFileInfo($resource)] : [];
        } else {
            $files = $this->extractFromDirectory($resource);
        }

        return $files;
    }

    private function toSplFileInfo(string $file): \SplFileInfo
    {
        return new \SplFileInfo($file);
    }

    /**
<<<<<<< HEAD
     * @return bool
     *
     * @throws InvalidArgumentException
     */
    protected function isFile(string $file)
=======
     * @throws InvalidArgumentException
     */
    protected function isFile(string $file): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        if (!is_file($file)) {
            throw new InvalidArgumentException(sprintf('The "%s" file does not exist.', $file));
        }

        return true;
    }

    /**
     * @return bool
     */
    abstract protected function canBeExtracted(string $file);

    /**
<<<<<<< HEAD
     * @param string|array $resource Files, a file or a directory
     *
     * @return iterable
     */
    abstract protected function extractFromDirectory($resource);
=======
     * @return iterable
     */
    abstract protected function extractFromDirectory(string|array $resource);
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
}
