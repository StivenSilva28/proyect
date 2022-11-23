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

use Symfony\Component\Config\Resource\DirectoryResource;
use Symfony\Component\Routing\RouteCollection;

/**
 * AnnotationDirectoryLoader loads routing information from annotations set
 * on PHP classes and methods.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class AnnotationDirectoryLoader extends AnnotationFileLoader
{
    /**
<<<<<<< HEAD
     * Loads from annotations from a directory.
     *
     * @param string      $path A directory path
     * @param string|null $type The resource type
     *
     * @return RouteCollection
     *
     * @throws \InvalidArgumentException When the directory does not exist or its routes cannot be parsed
     */
    public function load($path, string $type = null)
=======
     * @throws \InvalidArgumentException When the directory does not exist or its routes cannot be parsed
     */
    public function load(mixed $path, string $type = null): ?RouteCollection
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        if (!is_dir($dir = $this->locator->locate($path))) {
            return parent::supports($path, $type) ? parent::load($path, $type) : new RouteCollection();
        }

        $collection = new RouteCollection();
        $collection->addResource(new DirectoryResource($dir, '/\.php$/'));
        $files = iterator_to_array(new \RecursiveIteratorIterator(
            new \RecursiveCallbackFilterIterator(
                new \RecursiveDirectoryIterator($dir, \FilesystemIterator::SKIP_DOTS | \FilesystemIterator::FOLLOW_SYMLINKS),
                function (\SplFileInfo $current) {
<<<<<<< HEAD
                    return '.' !== substr($current->getBasename(), 0, 1);
=======
                    return !str_starts_with($current->getBasename(), '.');
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
                }
            ),
            \RecursiveIteratorIterator::LEAVES_ONLY
        ));
        usort($files, function (\SplFileInfo $a, \SplFileInfo $b) {
            return (string) $a > (string) $b ? 1 : -1;
        });

        foreach ($files as $file) {
            if (!$file->isFile() || !str_ends_with($file->getFilename(), '.php')) {
                continue;
            }

            if ($class = $this->findClass($file)) {
                $refl = new \ReflectionClass($class);
                if ($refl->isAbstract()) {
                    continue;
                }

                $collection->addCollection($this->loader->load($class, $type));
            }
        }

        return $collection;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function supports($resource, string $type = null)
    {
        if ('annotation' === $type) {
=======
    public function supports(mixed $resource, string $type = null): bool
    {
        if (\in_array($type, ['annotation', 'attribute'], true)) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            return true;
        }

        if ($type || !\is_string($resource)) {
            return false;
        }

        try {
            return is_dir($this->locator->locate($resource));
<<<<<<< HEAD
        } catch (\Exception $e) {
=======
        } catch (\Exception) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            return false;
        }
    }
}
