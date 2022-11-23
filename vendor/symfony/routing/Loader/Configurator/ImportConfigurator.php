<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Routing\Loader\Configurator;

use Symfony\Component\Routing\RouteCollection;

/**
 * @author Nicolas Grekas <p@tchwork.com>
 */
class ImportConfigurator
{
    use Traits\HostTrait;
    use Traits\PrefixTrait;
    use Traits\RouteTrait;

<<<<<<< HEAD
    private $parent;
=======
    private RouteCollection $parent;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    public function __construct(RouteCollection $parent, RouteCollection $route)
    {
        $this->parent = $parent;
        $this->route = $route;
    }

<<<<<<< HEAD
    /**
     * @return array
     */
    public function __sleep()
=======
    public function __sleep(): array
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        throw new \BadMethodCallException('Cannot serialize '.__CLASS__);
    }

    public function __wakeup()
    {
        throw new \BadMethodCallException('Cannot unserialize '.__CLASS__);
    }

    public function __destruct()
    {
        $this->parent->addCollection($this->route);
    }

    /**
     * Sets the prefix to add to the path of all child routes.
     *
     * @param string|array $prefix the prefix, or the localized prefixes
     *
     * @return $this
     */
<<<<<<< HEAD
    final public function prefix($prefix, bool $trailingSlashOnRoot = true): self
=======
    final public function prefix(string|array $prefix, bool $trailingSlashOnRoot = true): static
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->addPrefix($this->route, $prefix, $trailingSlashOnRoot);

        return $this;
    }

    /**
     * Sets the prefix to add to the name of all child routes.
     *
     * @return $this
     */
<<<<<<< HEAD
    final public function namePrefix(string $namePrefix): self
=======
    final public function namePrefix(string $namePrefix): static
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->route->addNamePrefix($namePrefix);

        return $this;
    }

    /**
     * Sets the host to use for all child routes.
     *
     * @param string|array $host the host, or the localized hosts
     *
     * @return $this
     */
<<<<<<< HEAD
    final public function host($host): self
=======
    final public function host(string|array $host): static
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->addHost($this->route, $host);

        return $this;
    }
}
