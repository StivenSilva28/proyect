<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Console\Style;

use Symfony\Component\Console\Formatter\OutputFormatterInterface;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Output\ConsoleOutputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Decorates output to add console style guide helpers.
 *
 * @author Kevin Bond <kevinbond@gmail.com>
 */
abstract class OutputStyle implements OutputInterface, StyleInterface
{
<<<<<<< HEAD
    private $output;
=======
    private OutputInterface $output;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    public function __construct(OutputInterface $output)
    {
        $this->output = $output;
    }

    /**
     * {@inheritdoc}
     */
    public function newLine(int $count = 1)
    {
        $this->output->write(str_repeat(\PHP_EOL, $count));
    }

<<<<<<< HEAD
    /**
     * @return ProgressBar
     */
    public function createProgressBar(int $max = 0)
=======
    public function createProgressBar(int $max = 0): ProgressBar
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return new ProgressBar($this->output, $max);
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function write($messages, bool $newline = false, int $type = self::OUTPUT_NORMAL)
=======
    public function write(string|iterable $messages, bool $newline = false, int $type = self::OUTPUT_NORMAL)
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->output->write($messages, $newline, $type);
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function writeln($messages, int $type = self::OUTPUT_NORMAL)
=======
    public function writeln(string|iterable $messages, int $type = self::OUTPUT_NORMAL)
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->output->writeln($messages, $type);
    }

    /**
     * {@inheritdoc}
     */
    public function setVerbosity(int $level)
    {
        $this->output->setVerbosity($level);
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function getVerbosity()
=======
    public function getVerbosity(): int
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->output->getVerbosity();
    }

    /**
     * {@inheritdoc}
     */
    public function setDecorated(bool $decorated)
    {
        $this->output->setDecorated($decorated);
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function isDecorated()
=======
    public function isDecorated(): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->output->isDecorated();
    }

    /**
     * {@inheritdoc}
     */
    public function setFormatter(OutputFormatterInterface $formatter)
    {
        $this->output->setFormatter($formatter);
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function getFormatter()
=======
    public function getFormatter(): OutputFormatterInterface
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->output->getFormatter();
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function isQuiet()
=======
    public function isQuiet(): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->output->isQuiet();
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function isVerbose()
=======
    public function isVerbose(): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->output->isVerbose();
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function isVeryVerbose()
=======
    public function isVeryVerbose(): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->output->isVeryVerbose();
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function isDebug()
=======
    public function isDebug(): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->output->isDebug();
    }

    protected function getErrorOutput()
    {
        if (!$this->output instanceof ConsoleOutputInterface) {
            return $this->output;
        }

        return $this->output->getErrorOutput();
    }
}
