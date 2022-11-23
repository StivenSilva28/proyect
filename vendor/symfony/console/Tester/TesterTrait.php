<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Console\Tester;

use PHPUnit\Framework\Assert;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Output\StreamOutput;
use Symfony\Component\Console\Tester\Constraint\CommandIsSuccessful;

/**
 * @author Amrouche Hamza <hamza.simperfit@gmail.com>
 */
trait TesterTrait
{
<<<<<<< HEAD
    /** @var StreamOutput */
    private $output;
    private $inputs = [];
    private $captureStreamsIndependently = false;
    /** @var InputInterface */
    private $input;
    /** @var int */
    private $statusCode;
=======
    private StreamOutput $output;
    private array $inputs = [];
    private bool $captureStreamsIndependently = false;
    private InputInterface $input;
    private int $statusCode;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * Gets the display returned by the last execution of the command or application.
     *
     * @throws \RuntimeException If it's called before the execute method
<<<<<<< HEAD
     *
     * @return string
     */
    public function getDisplay(bool $normalize = false)
    {
        if (null === $this->output) {
=======
     */
    public function getDisplay(bool $normalize = false): string
    {
        if (!isset($this->output)) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            throw new \RuntimeException('Output not initialized, did you execute the command before requesting the display?');
        }

        rewind($this->output->getStream());

        $display = stream_get_contents($this->output->getStream());

        if ($normalize) {
            $display = str_replace(\PHP_EOL, "\n", $display);
        }

        return $display;
    }

    /**
     * Gets the output written to STDERR by the application.
     *
     * @param bool $normalize Whether to normalize end of lines to \n or not
<<<<<<< HEAD
     *
     * @return string
     */
    public function getErrorOutput(bool $normalize = false)
=======
     */
    public function getErrorOutput(bool $normalize = false): string
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        if (!$this->captureStreamsIndependently) {
            throw new \LogicException('The error output is not available when the tester is run without "capture_stderr_separately" option set.');
        }

        rewind($this->output->getErrorOutput()->getStream());

        $display = stream_get_contents($this->output->getErrorOutput()->getStream());

        if ($normalize) {
            $display = str_replace(\PHP_EOL, "\n", $display);
        }

        return $display;
    }

    /**
     * Gets the input instance used by the last execution of the command or application.
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
     * Gets the output instance used by the last execution of the command or application.
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

    /**
     * Gets the status code returned by the last execution of the command or application.
     *
     * @throws \RuntimeException If it's called before the execute method
<<<<<<< HEAD
     *
     * @return int
     */
    public function getStatusCode()
    {
        if (null === $this->statusCode) {
            throw new \RuntimeException('Status code not initialized, did you execute the command before requesting the status code?');
        }

        return $this->statusCode;
=======
     */
    public function getStatusCode(): int
    {
        return $this->statusCode ?? throw new \RuntimeException('Status code not initialized, did you execute the command before requesting the status code?');
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }

    public function assertCommandIsSuccessful(string $message = ''): void
    {
        Assert::assertThat($this->statusCode, new CommandIsSuccessful(), $message);
    }

    /**
     * Sets the user inputs.
     *
     * @param array $inputs An array of strings representing each input
     *                      passed to the command input stream
     *
     * @return $this
     */
<<<<<<< HEAD
    public function setInputs(array $inputs)
=======
    public function setInputs(array $inputs): static
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->inputs = $inputs;

        return $this;
    }

    /**
     * Initializes the output property.
     *
     * Available options:
     *
     *  * decorated:                 Sets the output decorated flag
     *  * verbosity:                 Sets the output verbosity flag
     *  * capture_stderr_separately: Make output of stdOut and stdErr separately available
     */
    private function initOutput(array $options)
    {
        $this->captureStreamsIndependently = \array_key_exists('capture_stderr_separately', $options) && $options['capture_stderr_separately'];
        if (!$this->captureStreamsIndependently) {
            $this->output = new StreamOutput(fopen('php://memory', 'w', false));
            if (isset($options['decorated'])) {
                $this->output->setDecorated($options['decorated']);
            }
            if (isset($options['verbosity'])) {
                $this->output->setVerbosity($options['verbosity']);
            }
        } else {
            $this->output = new ConsoleOutput(
                $options['verbosity'] ?? ConsoleOutput::VERBOSITY_NORMAL,
                $options['decorated'] ?? null
            );

            $errorOutput = new StreamOutput(fopen('php://memory', 'w', false));
            $errorOutput->setFormatter($this->output->getFormatter());
            $errorOutput->setVerbosity($this->output->getVerbosity());
            $errorOutput->setDecorated($this->output->isDecorated());

            $reflectedOutput = new \ReflectionObject($this->output);
            $strErrProperty = $reflectedOutput->getProperty('stderr');
<<<<<<< HEAD
            $strErrProperty->setAccessible(true);
=======
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            $strErrProperty->setValue($this->output, $errorOutput);

            $reflectedParent = $reflectedOutput->getParentClass();
            $streamProperty = $reflectedParent->getProperty('stream');
<<<<<<< HEAD
            $streamProperty->setAccessible(true);
=======
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            $streamProperty->setValue($this->output, fopen('php://memory', 'w', false));
        }
    }

    /**
     * @return resource
     */
    private static function createStream(array $inputs)
    {
        $stream = fopen('php://memory', 'r+', false);

        foreach ($inputs as $input) {
            fwrite($stream, $input.\PHP_EOL);
        }

        rewind($stream);

        return $stream;
    }
}
