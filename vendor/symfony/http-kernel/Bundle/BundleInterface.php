<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\Bundle;

use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;

/**
 * BundleInterface.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
interface BundleInterface extends ContainerAwareInterface
{
    /**
     * Boots the Bundle.
     */
    public function boot();

    /**
     * Shutdowns the Bundle.
     */
    public function shutdown();

    /**
     * Builds the bundle.
     *
     * It is only ever called once when the cache is empty.
     */
    public function build(ContainerBuilder $container);

    /**
     * Returns the container extension that should be implicitly loaded.
<<<<<<< HEAD
     *
     * @return ExtensionInterface|null
     */
    public function getContainerExtension();

    /**
     * Returns the bundle name (the class short name).
     *
     * @return string
     */
    public function getName();

    /**
     * Gets the Bundle namespace.
     *
     * @return string
     */
    public function getNamespace();
=======
     */
    public function getContainerExtension(): ?ExtensionInterface;

    /**
     * Returns the bundle name (the class short name).
     */
    public function getName(): string;

    /**
     * Gets the Bundle namespace.
     */
    public function getNamespace(): string;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * Gets the Bundle directory path.
     *
     * The path should always be returned as a Unix path (with /).
<<<<<<< HEAD
     *
     * @return string
     */
    public function getPath();
=======
     */
    public function getPath(): string;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
}