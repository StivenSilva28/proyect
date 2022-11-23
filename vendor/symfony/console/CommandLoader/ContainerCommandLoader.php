<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Console\CommandLoader;

use Psr\Container\ContainerInterface;
<<<<<<< HEAD
=======
use Symfony\Component\Console\Command\Command;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
use Symfony\Component\Console\Exception\CommandNotFoundException;

/**
 * Loads commands from a PSR-11 container.
 *
 * @author Robin Chalas <robin.chalas@gmail.com>
 */
class ContainerCommandLoader implements CommandLoaderInterface
{
<<<<<<< HEAD
    private $container;
    private $commandMap;
=======
    private ContainerInterface $container;
    private array $commandMap;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * @param array $commandMap An array with command names as keys and service ids as values
     */
    public function __construct(ContainerInterface $container, array $commandMap)
    {
        $this->container = $container;
        $this->commandMap = $commandMap;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function get(string $name)
=======
    public function get(string $name): Command
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        if (!$this->has($name)) {
            throw new CommandNotFoundException(sprintf('Command "%s" does not exist.', $name));
        }

        return $this->container->get($this->commandMap[$name]);
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function has(string $name)
=======
    public function has(string $name): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return isset($this->commandMap[$name]) && $this->container->has($this->commandMap[$name]);
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function getNames()
=======
    public function getNames(): array
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return array_keys($this->commandMap);
    }
}
