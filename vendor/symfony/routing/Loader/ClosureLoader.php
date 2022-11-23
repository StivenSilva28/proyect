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

use Symfony\Component\Config\Loader\Loader;
use Symfony\Component\Routing\RouteCollection;

/**
 * ClosureLoader loads routes from a PHP closure.
 *
 * The Closure must return a RouteCollection instance.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class ClosureLoader extends Loader
{
    /**
     * Loads a Closure.
<<<<<<< HEAD
     *
     * @param \Closure    $closure A Closure
     * @param string|null $type    The resource type
     *
     * @return RouteCollection
     */
    public function load($closure, string $type = null)
=======
     */
    public function load(mixed $closure, string $type = null): RouteCollection
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $closure($this->env);
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
        return $resource instanceof \Closure && (!$type || 'closure' === $type);
    }
}
