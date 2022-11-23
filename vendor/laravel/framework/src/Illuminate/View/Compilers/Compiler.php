<?php

namespace Illuminate\View\Compilers;

use Illuminate\Filesystem\Filesystem;
<<<<<<< HEAD
=======
use Illuminate\Support\Str;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
use InvalidArgumentException;

abstract class Compiler
{
    /**
<<<<<<< HEAD
     * The Filesystem instance.
=======
     * The filesystem instance.
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     *
     * @var \Illuminate\Filesystem\Filesystem
     */
    protected $files;

    /**
<<<<<<< HEAD
     * Get the cache path for the compiled views.
=======
     * The cache path for the compiled views.
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     *
     * @var string
     */
    protected $cachePath;

    /**
<<<<<<< HEAD
=======
     * The base path that should be removed from paths before hashing.
     *
     * @var string
     */
    protected $basePath;

    /**
     * Determines if compiled views should be cached.
     *
     * @var bool
     */
    protected $shouldCache;

    /**
     * The compiled view file extension.
     *
     * @var string
     */
    protected $compiledExtension = 'php';

    /**
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * Create a new compiler instance.
     *
     * @param  \Illuminate\Filesystem\Filesystem  $files
     * @param  string  $cachePath
<<<<<<< HEAD
=======
     * @param  string  $basePath
     * @param  bool  $shouldCache
     * @param  string  $compiledExtension
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * @return void
     *
     * @throws \InvalidArgumentException
     */
<<<<<<< HEAD
    public function __construct(Filesystem $files, $cachePath)
=======
    public function __construct(
        Filesystem $files,
        $cachePath,
        $basePath = '',
        $shouldCache = true,
        $compiledExtension = 'php')
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        if (! $cachePath) {
            throw new InvalidArgumentException('Please provide a valid cache path.');
        }

        $this->files = $files;
        $this->cachePath = $cachePath;
<<<<<<< HEAD
=======
        $this->basePath = $basePath;
        $this->shouldCache = $shouldCache;
        $this->compiledExtension = $compiledExtension;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }

    /**
     * Get the path to the compiled version of a view.
     *
     * @param  string  $path
     * @return string
     */
    public function getCompiledPath($path)
    {
<<<<<<< HEAD
        return $this->cachePath.'/'.sha1('v2'.$path).'.php';
=======
        return $this->cachePath.'/'.sha1('v2'.Str::after($path, $this->basePath)).'.'.$this->compiledExtension;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }

    /**
     * Determine if the view at the given path is expired.
     *
     * @param  string  $path
     * @return bool
     */
    public function isExpired($path)
    {
<<<<<<< HEAD
=======
        if (! $this->shouldCache) {
            return true;
        }

>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
        $compiled = $this->getCompiledPath($path);

        // If the compiled file doesn't exist we will indicate that the view is expired
        // so that it can be re-compiled. Else, we will verify the last modification
        // of the views is less than the modification times of the compiled views.
        if (! $this->files->exists($compiled)) {
            return true;
        }

        return $this->files->lastModified($path) >=
               $this->files->lastModified($compiled);
    }

    /**
     * Create the compiled file directory if necessary.
     *
     * @param  string  $path
     * @return void
     */
    protected function ensureCompiledDirectoryExists($path)
    {
        if (! $this->files->exists(dirname($path))) {
            $this->files->makeDirectory(dirname($path), 0777, true, true);
        }
    }
}
