<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Console\Output;

/**
 * ConsoleOutputInterface is the interface implemented by ConsoleOutput class.
 * This adds information about stderr and section output stream.
 *
 * @author Dariusz Górecki <darek.krk@gmail.com>
 */
interface ConsoleOutputInterface extends OutputInterface
{
    /**
     * Gets the OutputInterface for errors.
<<<<<<< HEAD
     *
     * @return OutputInterface
     */
    public function getErrorOutput();
=======
     */
    public function getErrorOutput(): OutputInterface;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    public function setErrorOutput(OutputInterface $error);

    public function section(): ConsoleSectionOutput;
}
