<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Finder;

/**
 * Extends \SplFileInfo to support relative paths.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class SplFileInfo extends \SplFileInfo
{
<<<<<<< HEAD
    private $relativePath;
    private $relativePathname;
=======
    private string $relativePath;
    private string $relativePathname;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * @param string $file             The file name
     * @param string $relativePath     The relative path
     * @param string $relativePathname The relative path name
     */
    public function __construct(string $file, string $relativePath, string $relativePathname)
    {
        parent::__construct($file);
        $this->relativePath = $relativePath;
        $this->relativePathname = $relativePathname;
    }

    /**
     * Returns the relative path.
     *
     * This path does not contain the file name.
<<<<<<< HEAD
     *
     * @return string
     */
    public function getRelativePath()
=======
     */
    public function getRelativePath(): string
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->relativePath;
    }

    /**
     * Returns the relative path name.
     *
     * This path contains the file name.
<<<<<<< HEAD
     *
     * @return string
     */
    public function getRelativePathname()
=======
     */
    public function getRelativePathname(): string
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->relativePathname;
    }

    public function getFilenameWithoutExtension(): string
    {
        $filename = $this->getFilename();

        return pathinfo($filename, \PATHINFO_FILENAME);
    }

    /**
     * Returns the contents of the file.
     *
<<<<<<< HEAD
     * @return string
     *
     * @throws \RuntimeException
     */
    public function getContents()
=======
     * @throws \RuntimeException
     */
    public function getContents(): string
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        set_error_handler(function ($type, $msg) use (&$error) { $error = $msg; });
        try {
            $content = file_get_contents($this->getPathname());
        } finally {
            restore_error_handler();
        }
        if (false === $content) {
            throw new \RuntimeException($error);
        }

        return $content;
    }
}
