<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Routing\Matcher\Dumper;

use Symfony\Component\Routing\RouteCollection;

/**
 * MatcherDumper is the abstract class for all built-in matcher dumpers.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
abstract class MatcherDumper implements MatcherDumperInterface
{
<<<<<<< HEAD
    private $routes;
=======
    private RouteCollection $routes;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    public function __construct(RouteCollection $routes)
    {
        $this->routes = $routes;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function getRoutes()
=======
    public function getRoutes(): RouteCollection
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->routes;
    }
}
