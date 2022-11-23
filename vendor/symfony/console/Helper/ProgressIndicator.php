<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Console\Helper;

use Symfony\Component\Console\Exception\InvalidArgumentException;
use Symfony\Component\Console\Exception\LogicException;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @author Kevin Bond <kevinbond@gmail.com>
 */
class ProgressIndicator
{
    private const FORMATS = [
        'normal' => ' %indicator% %message%',
        'normal_no_ansi' => ' %message%',

        'verbose' => ' %indicator% %message% (%elapsed:6s%)',
        'verbose_no_ansi' => ' %message% (%elapsed:6s%)',

        'very_verbose' => ' %indicator% %message% (%elapsed:6s%, %memory:6s%)',
        'very_verbose_no_ansi' => ' %message% (%elapsed:6s%, %memory:6s%)',
    ];

<<<<<<< HEAD
    private $output;
    private $startTime;
    private $format;
    private $message;
    private $indicatorValues;
    private $indicatorCurrent;
    private $indicatorChangeInterval;
    private $indicatorUpdateTime;
    private $started = false;
=======
    private OutputInterface $output;
    private int $startTime;
    private ?string $format = null;
    private ?string $message = null;
    private array $indicatorValues;
    private int $indicatorCurrent;
    private int $indicatorChangeInterval;
    private float $indicatorUpdateTime;
    private bool $started = false;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * @var array<string, callable>
     */
<<<<<<< HEAD
    private static $formatters;
=======
    private static array $formatters;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * @param int        $indicatorChangeInterval Change interval in milliseconds
     * @param array|null $indicatorValues         Animated indicator characters
     */
    public function __construct(OutputInterface $output, string $format = null, int $indicatorChangeInterval = 100, array $indicatorValues = null)
    {
        $this->output = $output;

        if (null === $format) {
            $format = $this->determineBestFormat();
        }

        if (null === $indicatorValues) {
            $indicatorValues = ['-', '\\', '|', '/'];
        }

        $indicatorValues = array_values($indicatorValues);

        if (2 > \count($indicatorValues)) {
            throw new InvalidArgumentException('Must have at least 2 indicator value characters.');
        }

        $this->format = self::getFormatDefinition($format);
        $this->indicatorChangeInterval = $indicatorChangeInterval;
        $this->indicatorValues = $indicatorValues;
        $this->startTime = time();
    }

    /**
     * Sets the current indicator message.
     */
    public function setMessage(?string $message)
    {
        $this->message = $message;

        $this->display();
    }

    /**
     * Starts the indicator output.
     */
    public function start(string $message)
    {
        if ($this->started) {
            throw new LogicException('Progress indicator already started.');
        }

        $this->message = $message;
        $this->started = true;
        $this->startTime = time();
        $this->indicatorUpdateTime = $this->getCurrentTimeInMilliseconds() + $this->indicatorChangeInterval;
        $this->indicatorCurrent = 0;

        $this->display();
    }

    /**
     * Advances the indicator.
     */
    public function advance()
    {
        if (!$this->started) {
            throw new LogicException('Progress indicator has not yet been started.');
        }

        if (!$this->output->isDecorated()) {
            return;
        }

        $currentTime = $this->getCurrentTimeInMilliseconds();

        if ($currentTime < $this->indicatorUpdateTime) {
            return;
        }

        $this->indicatorUpdateTime = $currentTime + $this->indicatorChangeInterval;
        ++$this->indicatorCurrent;

        $this->display();
    }

    /**
     * Finish the indicator with message.
     *
     * @param $message
     */
    public function finish(string $message)
    {
        if (!$this->started) {
            throw new LogicException('Progress indicator has not yet been started.');
        }

        $this->message = $message;
        $this->display();
        $this->output->writeln('');
        $this->started = false;
    }

    /**
     * Gets the format for a given name.
<<<<<<< HEAD
     *
     * @return string|null
     */
    public static function getFormatDefinition(string $name)
=======
     */
    public static function getFormatDefinition(string $name): ?string
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return self::FORMATS[$name] ?? null;
    }

    /**
     * Sets a placeholder formatter for a given name.
     *
     * This method also allow you to override an existing placeholder.
     */
    public static function setPlaceholderFormatterDefinition(string $name, callable $callable)
    {
<<<<<<< HEAD
        if (!self::$formatters) {
            self::$formatters = self::initPlaceholderFormatters();
        }
=======
        self::$formatters ??= self::initPlaceholderFormatters();
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

        self::$formatters[$name] = $callable;
    }

    /**
     * Gets the placeholder formatter for a given name (including the delimiter char like %).
<<<<<<< HEAD
     *
     * @return callable|null
     */
    public static function getPlaceholderFormatterDefinition(string $name)
    {
        if (!self::$formatters) {
            self::$formatters = self::initPlaceholderFormatters();
        }
=======
     */
    public static function getPlaceholderFormatterDefinition(string $name): ?callable
    {
        self::$formatters ??= self::initPlaceholderFormatters();
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

        return self::$formatters[$name] ?? null;
    }

    private function display()
    {
        if (OutputInterface::VERBOSITY_QUIET === $this->output->getVerbosity()) {
            return;
        }

        $this->overwrite(preg_replace_callback("{%([a-z\-_]+)(?:\:([^%]+))?%}i", function ($matches) {
            if ($formatter = self::getPlaceholderFormatterDefinition($matches[1])) {
                return $formatter($this);
            }

            return $matches[0];
        }, $this->format ?? ''));
    }

    private function determineBestFormat(): string
    {
<<<<<<< HEAD
        switch ($this->output->getVerbosity()) {
            // OutputInterface::VERBOSITY_QUIET: display is disabled anyway
            case OutputInterface::VERBOSITY_VERBOSE:
                return $this->output->isDecorated() ? 'verbose' : 'verbose_no_ansi';
            case OutputInterface::VERBOSITY_VERY_VERBOSE:
            case OutputInterface::VERBOSITY_DEBUG:
                return $this->output->isDecorated() ? 'very_verbose' : 'very_verbose_no_ansi';
            default:
                return $this->output->isDecorated() ? 'normal' : 'normal_no_ansi';
        }
=======
        return match ($this->output->getVerbosity()) {
            // OutputInterface::VERBOSITY_QUIET: display is disabled anyway
            OutputInterface::VERBOSITY_VERBOSE => $this->output->isDecorated() ? 'verbose' : 'verbose_no_ansi',
            OutputInterface::VERBOSITY_VERY_VERBOSE,
            OutputInterface::VERBOSITY_DEBUG => $this->output->isDecorated() ? 'very_verbose' : 'very_verbose_no_ansi',
            default => $this->output->isDecorated() ? 'normal' : 'normal_no_ansi',
        };
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }

    /**
     * Overwrites a previous message to the output.
     */
    private function overwrite(string $message)
    {
        if ($this->output->isDecorated()) {
            $this->output->write("\x0D\x1B[2K");
            $this->output->write($message);
        } else {
            $this->output->writeln($message);
        }
    }

    private function getCurrentTimeInMilliseconds(): float
    {
        return round(microtime(true) * 1000);
    }

<<<<<<< HEAD
=======
    /**
     * @return array<string, \Closure>
     */
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    private static function initPlaceholderFormatters(): array
    {
        return [
            'indicator' => function (self $indicator) {
                return $indicator->indicatorValues[$indicator->indicatorCurrent % \count($indicator->indicatorValues)];
            },
            'message' => function (self $indicator) {
                return $indicator->message;
            },
            'elapsed' => function (self $indicator) {
                return Helper::formatTime(time() - $indicator->startTime);
            },
            'memory' => function () {
                return Helper::formatMemory(memory_get_usage(true));
            },
        ];
    }
}