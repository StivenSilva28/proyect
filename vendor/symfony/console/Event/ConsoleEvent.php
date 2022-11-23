<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Console\Event;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Contracts\EventDispatcher\Event;

/**
 * Allows to inspect input and output of a command.
 *
 * @author Francesco Levorato <git@flevour.net>
 */
class ConsoleEvent extends Event
{
    protected $command;

<<<<<<< HEAD
    private $input;
    private $output;
=======
    private InputInterface $input;
    private OutputInterface $output;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    public function __construct(?Command $command, InputInterface $input, OutputInterface $output)
    {
        $this->command = $command;
        $this->input = $input;
        $this->output = $output;
    }

    /**
     * Gets the command that is executed.
<<<<<<< HEAD
     *
     * @return Command|null
     */
    public function getCommand()
=======
     */
    public function getCommand(): ?Command
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->command;
    }

    /**
     * Gets the input instance.
<<<<<<< HEAD
     *
     * @return InputInterface
     */
    public function getInput()
=======
     */
    public function getInput(): InputInterface
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->input;
    }

    /**
     * Gets the output instance.
<<<<<<< HEAD
     *
     * @return OutputInterface
     */
    public function getOutput()
=======
     */
    public function getOutput(): OutputInterface
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->output;
    }
}
