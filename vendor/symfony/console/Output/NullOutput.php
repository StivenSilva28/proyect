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

use Symfony\Component\Console\Formatter\NullOutputFormatter;
use Symfony\Component\Console\Formatter\OutputFormatterInterface;

/**
 * NullOutput suppresses all output.
 *
 *     $output = new NullOutput();
 *
 * @author Fabien Potencier <fabien@symfony.com>
 * @author Tobias Schultze <http://tobion.de>
 */
class NullOutput implements OutputInterface
{
<<<<<<< HEAD
    private $formatter;
=======
    private NullOutputFormatter $formatter;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * {@inheritdoc}
     */
    public function setFormatter(OutputFormatterInterface $formatter)
    {
        // do nothing
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function getFormatter()
    {
        if ($this->formatter) {
            return $this->formatter;
        }
        // to comply with the interface we must return a OutputFormatterInterface
        return $this->formatter = new NullOutputFormatter();
=======
    public function getFormatter(): OutputFormatterInterface
    {
        // to comply with the interface we must return a OutputFormatterInterface
        return $this->formatter ??= new NullOutputFormatter();
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }

    /**
     * {@inheritdoc}
     */
    public function setDecorated(bool $decorated)
    {
        // do nothing
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
        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function setVerbosity(int $level)
    {
        // do nothing
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
        return self::VERBOSITY_QUIET;
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
        return true;
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
        return false;
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
        return false;
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
        return false;
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
        // do nothing
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
        // do nothing
    }
}
