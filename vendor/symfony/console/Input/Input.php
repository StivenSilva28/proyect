<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Console\Input;

use Symfony\Component\Console\Exception\InvalidArgumentException;
use Symfony\Component\Console\Exception\RuntimeException;

/**
 * Input is the base class for all concrete Input classes.
 *
 * Three concrete classes are provided by default:
 *
 *  * `ArgvInput`: The input comes from the CLI arguments (argv)
 *  * `StringInput`: The input is provided as a string
 *  * `ArrayInput`: The input is provided as an array
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
abstract class Input implements InputInterface, StreamableInputInterface
{
    protected $definition;
    protected $stream;
    protected $options = [];
    protected $arguments = [];
    protected $interactive = true;

    public function __construct(InputDefinition $definition = null)
    {
        if (null === $definition) {
            $this->definition = new InputDefinition();
        } else {
            $this->bind($definition);
            $this->validate();
        }
    }

    /**
     * {@inheritdoc}
     */
    public function bind(InputDefinition $definition)
    {
        $this->arguments = [];
        $this->options = [];
        $this->definition = $definition;

        $this->parse();
    }

    /**
     * Processes command line arguments.
     */
    abstract protected function parse();

    /**
     * {@inheritdoc}
     */
    public function validate()
    {
        $definition = $this->definition;
        $givenArguments = $this->arguments;

        $missingArguments = array_filter(array_keys($definition->getArguments()), function ($argument) use ($definition, $givenArguments) {
            return !\array_key_exists($argument, $givenArguments) && $definition->getArgument($argument)->isRequired();
        });

        if (\count($missingArguments) > 0) {
            throw new RuntimeException(sprintf('Not enough arguments (missing: "%s").', implode(', ', $missingArguments)));
        }
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function isInteractive()
=======
    public function isInteractive(): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->interactive;
    }

    /**
     * {@inheritdoc}
     */
    public function setInteractive(bool $interactive)
    {
        $this->interactive = $interactive;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function getArguments()
=======
    public function getArguments(): array
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return array_merge($this->definition->getArgumentDefaults(), $this->arguments);
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function getArgument(string $name)
=======
    public function getArgument(string $name): mixed
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        if (!$this->definition->hasArgument($name)) {
            throw new InvalidArgumentException(sprintf('The "%s" argument does not exist.', $name));
        }

        return $this->arguments[$name] ?? $this->definition->getArgument($name)->getDefault();
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function setArgument(string $name, $value)
=======
    public function setArgument(string $name, mixed $value)
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        if (!$this->definition->hasArgument($name)) {
            throw new InvalidArgumentException(sprintf('The "%s" argument does not exist.', $name));
        }

        $this->arguments[$name] = $value;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function hasArgument(string $name)
=======
    public function hasArgument(string $name): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->definition->hasArgument($name);
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function getOptions()
=======
    public function getOptions(): array
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return array_merge($this->definition->getOptionDefaults(), $this->options);
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function getOption(string $name)
=======
    public function getOption(string $name): mixed
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        if ($this->definition->hasNegation($name)) {
            if (null === $value = $this->getOption($this->definition->negationToName($name))) {
                return $value;
            }

            return !$value;
        }

        if (!$this->definition->hasOption($name)) {
            throw new InvalidArgumentException(sprintf('The "%s" option does not exist.', $name));
        }

        return \array_key_exists($name, $this->options) ? $this->options[$name] : $this->definition->getOption($name)->getDefault();
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function setOption(string $name, $value)
=======
    public function setOption(string $name, mixed $value)
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        if ($this->definition->hasNegation($name)) {
            $this->options[$this->definition->negationToName($name)] = !$value;

            return;
        } elseif (!$this->definition->hasOption($name)) {
            throw new InvalidArgumentException(sprintf('The "%s" option does not exist.', $name));
        }

        $this->options[$name] = $value;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function hasOption(string $name)
=======
    public function hasOption(string $name): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->definition->hasOption($name) || $this->definition->hasNegation($name);
    }

    /**
     * Escapes a token through escapeshellarg if it contains unsafe chars.
<<<<<<< HEAD
     *
     * @return string
     */
    public function escapeToken(string $token)
=======
     */
    public function escapeToken(string $token): string
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return preg_match('{^[\w-]+$}', $token) ? $token : escapeshellarg($token);
    }

    /**
     * {@inheritdoc}
     */
    public function setStream($stream)
    {
        $this->stream = $stream;
    }

    /**
     * {@inheritdoc}
     */
    public function getStream()
    {
        return $this->stream;
    }
}
