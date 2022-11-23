<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Routing\Loader\Configurator\Traits;

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

trait RouteTrait
{
    /**
     * @var RouteCollection|Route
     */
    protected $route;

    /**
     * Adds defaults.
     *
     * @return $this
     */
<<<<<<< HEAD
    final public function defaults(array $defaults): self
=======
    final public function defaults(array $defaults): static
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->route->addDefaults($defaults);

        return $this;
    }

    /**
     * Adds requirements.
     *
     * @return $this
     */
<<<<<<< HEAD
    final public function requirements(array $requirements): self
=======
    final public function requirements(array $requirements): static
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->route->addRequirements($requirements);

        return $this;
    }

    /**
     * Adds options.
     *
     * @return $this
     */
<<<<<<< HEAD
    final public function options(array $options): self
=======
    final public function options(array $options): static
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->route->addOptions($options);

        return $this;
    }

    /**
     * Whether paths should accept utf8 encoding.
     *
     * @return $this
     */
<<<<<<< HEAD
    final public function utf8(bool $utf8 = true): self
=======
    final public function utf8(bool $utf8 = true): static
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->route->addOptions(['utf8' => $utf8]);

        return $this;
    }

    /**
     * Sets the condition.
     *
     * @return $this
     */
<<<<<<< HEAD
    final public function condition(string $condition): self
=======
    final public function condition(string $condition): static
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->route->setCondition($condition);

        return $this;
    }

    /**
     * Sets the pattern for the host.
     *
     * @return $this
     */
<<<<<<< HEAD
    final public function host(string $pattern): self
=======
    final public function host(string $pattern): static
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->route->setHost($pattern);

        return $this;
    }

    /**
     * Sets the schemes (e.g. 'https') this route is restricted to.
     * So an empty array means that any scheme is allowed.
     *
     * @param string[] $schemes
     *
     * @return $this
     */
<<<<<<< HEAD
    final public function schemes(array $schemes): self
=======
    final public function schemes(array $schemes): static
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->route->setSchemes($schemes);

        return $this;
    }

    /**
     * Sets the HTTP methods (e.g. 'POST') this route is restricted to.
     * So an empty array means that any method is allowed.
     *
     * @param string[] $methods
     *
     * @return $this
     */
<<<<<<< HEAD
    final public function methods(array $methods): self
=======
    final public function methods(array $methods): static
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->route->setMethods($methods);

        return $this;
    }

    /**
     * Adds the "_controller" entry to defaults.
     *
     * @param callable|string|array $controller a callable or parseable pseudo-callable
     *
     * @return $this
     */
<<<<<<< HEAD
    final public function controller($controller): self
=======
    final public function controller(callable|string|array $controller): static
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->route->addDefaults(['_controller' => $controller]);

        return $this;
    }

    /**
     * Adds the "_locale" entry to defaults.
     *
     * @return $this
     */
<<<<<<< HEAD
    final public function locale(string $locale): self
=======
    final public function locale(string $locale): static
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->route->addDefaults(['_locale' => $locale]);

        return $this;
    }

    /**
     * Adds the "_format" entry to defaults.
     *
     * @return $this
     */
<<<<<<< HEAD
    final public function format(string $format): self
=======
    final public function format(string $format): static
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->route->addDefaults(['_format' => $format]);

        return $this;
    }

    /**
     * Adds the "_stateless" entry to defaults.
     *
     * @return $this
     */
<<<<<<< HEAD
    final public function stateless(bool $stateless = true): self
=======
    final public function stateless(bool $stateless = true): static
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->route->addDefaults(['_stateless' => $stateless]);

        return $this;
    }
}
