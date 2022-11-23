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

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Exception\CommandNotFoundException;

/**
 * @author Robin Chalas <robin.chalas@gmail.com>
 */
interface CommandLoaderInterface
{
    /**
     * Loads a command.
     *
<<<<<<< HEAD
     * @return Command
     *
     * @throws CommandNotFoundException
     */
    public function get(string $name);

    /**
     * Checks if a command exists.
     *
     * @return bool
     */
    public function has(string $name);
=======
     * @throws CommandNotFoundException
     */
    public function get(string $name): Command;

    /**
     * Checks if a command exists.
     */
    public function has(string $name): bool;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * @return string[]
     */
<<<<<<< HEAD
    public function getNames();
=======
    public function getNames(): array;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
}
