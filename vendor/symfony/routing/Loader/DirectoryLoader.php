<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Routing\Loader;

use Symfony\Component\Config\Loader\FileLoader;
use Symfony\Component\Config\Resource\DirectoryResource;
use Symfony\Component\Routing\RouteCollection;

class DirectoryLoader extends FileLoader
{
    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function load($file, string $type = null)
=======
    public function load(mixed $file, string $type = null): mixed
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $path = $this->locator->locate($file);

        $collection = new RouteCollection();
        $collection->addResource(new DirectoryResource($path));

        foreach (scandir($path) as $dir) {
            if ('.' !== $dir[0]) {
                $this->setCurrentDir($path);
                $subPath = $path.'/'.$dir;
                $subType = null;

                if (is_dir($subPath)) {
                    $subPath .= '/';
                    $subType = 'directory';
                }

                $subCollection = $this->import($subPath, $subType, false, $path);
                $collection->addCollection($subCollection);
            }
        }

        return $collection;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function supports($resource, string $type = null)
=======
    public function supports(mixed $resource, string $type = null): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        // only when type is forced to directory, not to conflict with AnnotationLoader

        return 'directory' === $type;
    }
}