<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Finder\Iterator;

<<<<<<< HEAD
=======
use Symfony\Component\Finder\SplFileInfo;

>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
/**
 * ExcludeDirectoryFilterIterator filters out directories.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 *
<<<<<<< HEAD
 * @extends \FilterIterator<string, \SplFileInfo>
 * @implements \RecursiveIterator<string, \SplFileInfo>
 */
class ExcludeDirectoryFilterIterator extends \FilterIterator implements \RecursiveIterator
{
    private $iterator;
    private $isRecursive;
    private $excludedDirs = [];
    private $excludedPattern;

    /**
     * @param \Iterator $iterator    The Iterator to filter
     * @param string[]  $directories An array of directories to exclude
=======
 * @extends \FilterIterator<string, SplFileInfo>
 * @implements \RecursiveIterator<string, SplFileInfo>
 */
class ExcludeDirectoryFilterIterator extends \FilterIterator implements \RecursiveIterator
{
    /** @var \Iterator<string, SplFileInfo> */
    private \Iterator $iterator;
    private bool $isRecursive;
    private array $excludedDirs = [];
    private ?string $excludedPattern = null;

    /**
     * @param \Iterator<string, SplFileInfo> $iterator    The Iterator to filter
     * @param string[]                       $directories An array of directories to exclude
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    public function __construct(\Iterator $iterator, array $directories)
    {
        $this->iterator = $iterator;
        $this->isRecursive = $iterator instanceof \RecursiveIterator;
        $patterns = [];
        foreach ($directories as $directory) {
            $directory = rtrim($directory, '/');
            if (!$this->isRecursive || str_contains($directory, '/')) {
                $patterns[] = preg_quote($directory, '#');
            } else {
                $this->excludedDirs[$directory] = true;
            }
        }
        if ($patterns) {
            $this->excludedPattern = '#(?:^|/)(?:'.implode('|', $patterns).')(?:/|$)#';
        }

        parent::__construct($iterator);
    }

    /**
     * Filters the iterator values.
<<<<<<< HEAD
     *
     * @return bool
     */
    #[\ReturnTypeWillChange]
    public function accept()
=======
     */
    public function accept(): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        if ($this->isRecursive && isset($this->excludedDirs[$this->getFilename()]) && $this->isDir()) {
            return false;
        }

        if ($this->excludedPattern) {
            $path = $this->isDir() ? $this->current()->getRelativePathname() : $this->current()->getRelativePath();
            $path = str_replace('\\', '/', $path);

            return !preg_match($this->excludedPattern, $path);
        }

        return true;
    }

<<<<<<< HEAD
    /**
     * @return bool
     */
    #[\ReturnTypeWillChange]
    public function hasChildren()
=======
    public function hasChildren(): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->isRecursive && $this->iterator->hasChildren();
    }

<<<<<<< HEAD
    /**
     * @return self
     */
    #[\ReturnTypeWillChange]
    public function getChildren()
=======
    public function getChildren(): self
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $children = new self($this->iterator->getChildren(), []);
        $children->excludedDirs = $this->excludedDirs;
        $children->excludedPattern = $this->excludedPattern;

        return $children;
    }
}
