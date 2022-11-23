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

use Symfony\Component\Console\Formatter\OutputFormatterInterface;

/**
 * OutputInterface is the interface implemented by all Output classes.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
interface OutputInterface
{
    public const VERBOSITY_QUIET = 16;
    public const VERBOSITY_NORMAL = 32;
    public const VERBOSITY_VERBOSE = 64;
    public const VERBOSITY_VERY_VERBOSE = 128;
    public const VERBOSITY_DEBUG = 256;

    public const OUTPUT_NORMAL = 1;
    public const OUTPUT_RAW = 2;
    public const OUTPUT_PLAIN = 4;

    /**
     * Writes a message to the output.
     *
<<<<<<< HEAD
     * @param string|iterable $messages The message as an iterable of strings or a single string
     * @param bool            $newline  Whether to add a newline
     * @param int             $options  A bitmask of options (one of the OUTPUT or VERBOSITY constants), 0 is considered the same as self::OUTPUT_NORMAL | self::VERBOSITY_NORMAL
     */
    public function write($messages, bool $newline = false, int $options = 0);
=======
     * @param $newline Whether to add a newline
     * @param $options A bitmask of options (one of the OUTPUT or VERBOSITY constants), 0 is considered the same as self::OUTPUT_NORMAL | self::VERBOSITY_NORMAL
     */
    public function write(string|iterable $messages, bool $newline = false, int $options = 0);
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * Writes a message to the output and adds a newline at the end.
     *
<<<<<<< HEAD
     * @param string|iterable $messages The message as an iterable of strings or a single string
     * @param int             $options  A bitmask of options (one of the OUTPUT or VERBOSITY constants), 0 is considered the same as self::OUTPUT_NORMAL | self::VERBOSITY_NORMAL
     */
    public function writeln($messages, int $options = 0);
=======
     * @param $options A bitmask of options (one of the OUTPUT or VERBOSITY constants), 0 is considered the same as self::OUTPUT_NORMAL | self::VERBOSITY_NORMAL
     */
    public function writeln(string|iterable $messages, int $options = 0);
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * Sets the verbosity of the output.
     */
    public function setVerbosity(int $level);

    /**
     * Gets the current verbosity of the output.
<<<<<<< HEAD
     *
     * @return int
     */
    public function getVerbosity();

    /**
     * Returns whether verbosity is quiet (-q).
     *
     * @return bool
     */
    public function isQuiet();

    /**
     * Returns whether verbosity is verbose (-v).
     *
     * @return bool
     */
    public function isVerbose();

    /**
     * Returns whether verbosity is very verbose (-vv).
     *
     * @return bool
     */
    public function isVeryVerbose();

    /**
     * Returns whether verbosity is debug (-vvv).
     *
     * @return bool
     */
    public function isDebug();
=======
     */
    public function getVerbosity(): int;

    /**
     * Returns whether verbosity is quiet (-q).
     */
    public function isQuiet(): bool;

    /**
     * Returns whether verbosity is verbose (-v).
     */
    public function isVerbose(): bool;

    /**
     * Returns whether verbosity is very verbose (-vv).
     */
    public function isVeryVerbose(): bool;

    /**
     * Returns whether verbosity is debug (-vvv).
     */
    public function isDebug(): bool;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * Sets the decorated flag.
     */
    public function setDecorated(bool $decorated);

    /**
     * Gets the decorated flag.
<<<<<<< HEAD
     *
     * @return bool
     */
    public function isDecorated();
=======
     */
    public function isDecorated(): bool;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    public function setFormatter(OutputFormatterInterface $formatter);

    /**
     * Returns current output formatter instance.
<<<<<<< HEAD
     *
     * @return OutputFormatterInterface
     */
    public function getFormatter();
=======
     */
    public function getFormatter(): OutputFormatterInterface;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
}