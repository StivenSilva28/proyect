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

<<<<<<< HEAD
=======
use Symfony\Component\Console\Command\Command;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
use Symfony\Component\Console\Exception\CommandNotFoundException;

/**
 * A simple command loader using factories to instantiate commands lazily.
 *
 * @author Maxime Steinhausser <maxime.steinhausser@gmail.com>
 */
class FactoryCommandLoader implements CommandLoaderInterface
{
<<<<<<< HEAD
    private $factories;
=======
    private array $factories;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * @param callable[] $factories Indexed by command names
     */
    public function __construct(array $factories)
    {
        $this->factories = $factories;
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
        return isset($this->factories[$name]);
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
        if (!isset($this->factories[$name])) {
            throw new CommandNotFoundException(sprintf('Command "%s" does not exist.', $name));
        }

        $factory = $this->factories[$name];

        return $factory();
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
        return array_keys($this->factories);
    }
}
