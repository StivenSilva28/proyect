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
use Symfony\Component\Console\Exception\InvalidOptionException;

/**
 * ArrayInput represents an input provided as an array.
 *
 * Usage:
 *
 *     $input = new ArrayInput(['command' => 'foo:bar', 'foo' => 'bar', '--bar' => 'foobar']);
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class ArrayInput extends Input
{
<<<<<<< HEAD
    private $parameters;
=======
    private array $parameters;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    public function __construct(array $parameters, InputDefinition $definition = null)
    {
        $this->parameters = $parameters;

        parent::__construct($definition);
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function getFirstArgument()
=======
    public function getFirstArgument(): ?string
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        foreach ($this->parameters as $param => $value) {
            if ($param && \is_string($param) && '-' === $param[0]) {
                continue;
            }

            return $value;
        }

        return null;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function hasParameterOption($values, bool $onlyParams = false)
=======
    public function hasParameterOption(string|array $values, bool $onlyParams = false): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $values = (array) $values;

        foreach ($this->parameters as $k => $v) {
            if (!\is_int($k)) {
                $v = $k;
            }

            if ($onlyParams && '--' === $v) {
                return false;
            }

            if (\in_array($v, $values)) {
                return true;
            }
        }

        return false;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function getParameterOption($values, $default = false, bool $onlyParams = false)
=======
    public function getParameterOption(string|array $values, string|bool|int|float|array|null $default = false, bool $onlyParams = false): mixed
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $values = (array) $values;

        foreach ($this->parameters as $k => $v) {
            if ($onlyParams && ('--' === $k || (\is_int($k) && '--' === $v))) {
                return $default;
            }

            if (\is_int($k)) {
                if (\in_array($v, $values)) {
                    return true;
                }
            } elseif (\in_array($k, $values)) {
                return $v;
            }
        }

        return $default;
    }

    /**
     * Returns a stringified representation of the args passed to the command.
<<<<<<< HEAD
     *
     * @return string
     */
    public function __toString()
=======
     */
    public function __toString(): string
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $params = [];
        foreach ($this->parameters as $param => $val) {
            if ($param && \is_string($param) && '-' === $param[0]) {
                $glue = ('-' === $param[1]) ? '=' : ' ';
                if (\is_array($val)) {
                    foreach ($val as $v) {
                        $params[] = $param.('' != $v ? $glue.$this->escapeToken($v) : '');
                    }
                } else {
                    $params[] = $param.('' != $val ? $glue.$this->escapeToken($val) : '');
                }
            } else {
<<<<<<< HEAD
                $params[] = \is_array($val) ? implode(' ', array_map([$this, 'escapeToken'], $val)) : $this->escapeToken($val);
=======
                $params[] = \is_array($val) ? implode(' ', array_map($this->escapeToken(...), $val)) : $this->escapeToken($val);
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            }
        }

        return implode(' ', $params);
    }

    /**
     * {@inheritdoc}
     */
    protected function parse()
    {
        foreach ($this->parameters as $key => $value) {
            if ('--' === $key) {
                return;
            }
            if (str_starts_with($key, '--')) {
                $this->addLongOption(substr($key, 2), $value);
            } elseif (str_starts_with($key, '-')) {
                $this->addShortOption(substr($key, 1), $value);
            } else {
                $this->addArgument($key, $value);
            }
        }
    }

    /**
     * Adds a short option value.
     *
     * @throws InvalidOptionException When option given doesn't exist
     */
<<<<<<< HEAD
    private function addShortOption(string $shortcut, $value)
=======
    private function addShortOption(string $shortcut, mixed $value)
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        if (!$this->definition->hasShortcut($shortcut)) {
            throw new InvalidOptionException(sprintf('The "-%s" option does not exist.', $shortcut));
        }

        $this->addLongOption($this->definition->getOptionForShortcut($shortcut)->getName(), $value);
    }

    /**
     * Adds a long option value.
     *
     * @throws InvalidOptionException When option given doesn't exist
     * @throws InvalidOptionException When a required value is missing
     */
<<<<<<< HEAD
    private function addLongOption(string $name, $value)
=======
    private function addLongOption(string $name, mixed $value)
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        if (!$this->definition->hasOption($name)) {
            if (!$this->definition->hasNegation($name)) {
                throw new InvalidOptionException(sprintf('The "--%s" option does not exist.', $name));
            }

            $optionName = $this->definition->negationToName($name);
            $this->options[$optionName] = false;

            return;
        }

        $option = $this->definition->getOption($name);

        if (null === $value) {
            if ($option->isValueRequired()) {
                throw new InvalidOptionException(sprintf('The "--%s" option requires a value.', $name));
            }

            if (!$option->isValueOptional()) {
                $value = true;
            }
        }

        $this->options[$name] = $value;
    }

    /**
     * Adds an argument value.
     *
<<<<<<< HEAD
     * @param string|int $name  The argument name
     * @param mixed      $value The value for the argument
     *
     * @throws InvalidArgumentException When argument given doesn't exist
     */
    private function addArgument($name, $value)
=======
     * @throws InvalidArgumentException When argument given doesn't exist
     */
    private function addArgument(string|int $name, mixed $value)
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        if (!$this->definition->hasArgument($name)) {
            throw new InvalidArgumentException(sprintf('The "%s" argument does not exist.', $name));
        }

        $this->arguments[$name] = $value;
    }
}
