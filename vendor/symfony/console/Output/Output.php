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

use Symfony\Component\Console\Formatter\OutputFormatter;
use Symfony\Component\Console\Formatter\OutputFormatterInterface;

/**
 * Base class for output classes.
 *
 * There are five levels of verbosity:
 *
 *  * normal: no option passed (normal output)
 *  * verbose: -v (more output)
 *  * very verbose: -vv (highly extended output)
 *  * debug: -vvv (all debug output)
 *  * quiet: -q (no output)
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
abstract class Output implements OutputInterface
{
<<<<<<< HEAD
    private $verbosity;
    private $formatter;
=======
    private int $verbosity;
    private OutputFormatterInterface $formatter;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * @param int|null                      $verbosity The verbosity level (one of the VERBOSITY constants in OutputInterface)
     * @param bool                          $decorated Whether to decorate messages
     * @param OutputFormatterInterface|null $formatter Output formatter instance (null to use default OutputFormatter)
     */
    public function __construct(?int $verbosity = self::VERBOSITY_NORMAL, bool $decorated = false, OutputFormatterInterface $formatter = null)
    {
        $this->verbosity = $verbosity ?? self::VERBOSITY_NORMAL;
        $this->formatter = $formatter ?? new OutputFormatter();
        $this->formatter->setDecorated($decorated);
    }

    /**
     * {@inheritdoc}
     */
    public function setFormatter(OutputFormatterInterface $formatter)
    {
        $this->formatter = $formatter;
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
        return $this->formatter;
    }

    /**
     * {@inheritdoc}
     */
    public function setDecorated(bool $decorated)
    {
        $this->formatter->setDecorated($decorated);
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
        return $this->formatter->isDecorated();
    }

    /**
     * {@inheritdoc}
     */
    public function setVerbosity(int $level)
    {
        $this->verbosity = $level;
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
        return $this->verbosity;
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
        return self::VERBOSITY_QUIET === $this->verbosity;
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
        return self::VERBOSITY_VERBOSE <= $this->verbosity;
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
        return self::VERBOSITY_VERY_VERBOSE <= $this->verbosity;
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
        return self::VERBOSITY_DEBUG <= $this->verbosity;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function writeln($messages, int $options = self::OUTPUT_NORMAL)
=======
    public function writeln(string|iterable $messages, int $options = self::OUTPUT_NORMAL)
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->write($messages, true, $options);
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function write($messages, bool $newline = false, int $options = self::OUTPUT_NORMAL)
=======
    public function write(string|iterable $messages, bool $newline = false, int $options = self::OUTPUT_NORMAL)
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        if (!is_iterable($messages)) {
            $messages = [$messages];
        }

        $types = self::OUTPUT_NORMAL | self::OUTPUT_RAW | self::OUTPUT_PLAIN;
        $type = $types & $options ?: self::OUTPUT_NORMAL;

        $verbosities = self::VERBOSITY_QUIET | self::VERBOSITY_NORMAL | self::VERBOSITY_VERBOSE | self::VERBOSITY_VERY_VERBOSE | self::VERBOSITY_DEBUG;
        $verbosity = $verbosities & $options ?: self::VERBOSITY_NORMAL;

        if ($verbosity > $this->getVerbosity()) {
            return;
        }

        foreach ($messages as $message) {
            switch ($type) {
                case OutputInterface::OUTPUT_NORMAL:
                    $message = $this->formatter->format($message);
                    break;
                case OutputInterface::OUTPUT_RAW:
                    break;
                case OutputInterface::OUTPUT_PLAIN:
                    $message = strip_tags($this->formatter->format($message));
                    break;
            }

            $this->doWrite($message ?? '', $newline);
        }
    }

    /**
     * Writes a message to the output.
     */
    abstract protected function doWrite(string $message, bool $newline);
}
