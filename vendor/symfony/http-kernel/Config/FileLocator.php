<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\Config;

use Symfony\Component\Config\FileLocator as BaseFileLocator;
use Symfony\Component\HttpKernel\KernelInterface;

/**
 * FileLocator uses the KernelInterface to locate resources in bundles.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class FileLocator extends BaseFileLocator
{
<<<<<<< HEAD
    private $kernel;
=======
    private KernelInterface $kernel;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    public function __construct(KernelInterface $kernel)
    {
        $this->kernel = $kernel;

        parent::__construct();
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function locate(string $file, string $currentPath = null, bool $first = true)
=======
    public function locate(string $file, string $currentPath = null, bool $first = true): string|array
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        if (isset($file[0]) && '@' === $file[0]) {
            $resource = $this->kernel->locateResource($file);

            return $first ? $resource : [$resource];
        }

        return parent::locate($file, $currentPath, $first);
    }
}
