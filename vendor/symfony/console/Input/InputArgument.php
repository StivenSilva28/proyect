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

<<<<<<< HEAD
=======
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Completion\CompletionInput;
use Symfony\Component\Console\Completion\CompletionSuggestions;
use Symfony\Component\Console\Completion\Suggestion;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
use Symfony\Component\Console\Exception\InvalidArgumentException;
use Symfony\Component\Console\Exception\LogicException;

/**
 * Represents a command line argument.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class InputArgument
{
    public const REQUIRED = 1;
    public const OPTIONAL = 2;
    public const IS_ARRAY = 4;

<<<<<<< HEAD
    private $name;
    private $mode;
    private $default;
    private $description;
=======
    private string $name;
    private int $mode;
    private string|int|bool|array|null|float $default;
    private array|\Closure $suggestedValues;
    private string $description;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * @param string                           $name        The argument name
     * @param int|null                         $mode        The argument mode: self::REQUIRED or self::OPTIONAL
     * @param string                           $description A description text
     * @param string|bool|int|float|array|null $default     The default value (for self::OPTIONAL mode only)
<<<<<<< HEAD
     *
     * @throws InvalidArgumentException When argument mode is not valid
     */
    public function __construct(string $name, int $mode = null, string $description = '', $default = null)
=======
     * @param array|\Closure(CompletionInput,CompletionSuggestions):list<string|Suggestion> $suggestedValues The values used for input completion
     *
     * @throws InvalidArgumentException When argument mode is not valid
     */
    public function __construct(string $name, int $mode = null, string $description = '', string|bool|int|float|array $default = null, \Closure|array $suggestedValues = [])
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        if (null === $mode) {
            $mode = self::OPTIONAL;
        } elseif ($mode > 7 || $mode < 1) {
            throw new InvalidArgumentException(sprintf('Argument mode "%s" is not valid.', $mode));
        }

        $this->name = $name;
        $this->mode = $mode;
        $this->description = $description;
<<<<<<< HEAD
=======
        $this->suggestedValues = $suggestedValues;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

        $this->setDefault($default);
    }

    /**
     * Returns the argument name.
<<<<<<< HEAD
     *
     * @return string
     */
    public function getName()
=======
     */
    public function getName(): string
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->name;
    }

    /**
     * Returns true if the argument is required.
     *
     * @return bool true if parameter mode is self::REQUIRED, false otherwise
     */
<<<<<<< HEAD
    public function isRequired()
=======
    public function isRequired(): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return self::REQUIRED === (self::REQUIRED & $this->mode);
    }

    /**
     * Returns true if the argument can take multiple values.
     *
     * @return bool true if mode is self::IS_ARRAY, false otherwise
     */
<<<<<<< HEAD
    public function isArray()
=======
    public function isArray(): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return self::IS_ARRAY === (self::IS_ARRAY & $this->mode);
    }

    /**
     * Sets the default value.
     *
<<<<<<< HEAD
     * @param string|bool|int|float|array|null $default
     *
     * @throws LogicException When incorrect default value is given
     */
    public function setDefault($default = null)
=======
     * @throws LogicException When incorrect default value is given
     */
    public function setDefault(string|bool|int|float|array $default = null)
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        if ($this->isRequired() && null !== $default) {
            throw new LogicException('Cannot set a default value except for InputArgument::OPTIONAL mode.');
        }

        if ($this->isArray()) {
            if (null === $default) {
                $default = [];
            } elseif (!\is_array($default)) {
                throw new LogicException('A default value for an array argument must be an array.');
            }
        }

        $this->default = $default;
    }

    /**
     * Returns the default value.
<<<<<<< HEAD
     *
     * @return string|bool|int|float|array|null
     */
    public function getDefault()
=======
     */
    public function getDefault(): string|bool|int|float|array|null
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->default;
    }

<<<<<<< HEAD
    /**
     * Returns the description text.
     *
     * @return string
     */
    public function getDescription()
=======
    public function hasCompletion(): bool
    {
        return [] !== $this->suggestedValues;
    }

    /**
     * Adds suggestions to $suggestions for the current completion input.
     *
     * @see Command::complete()
     */
    public function complete(CompletionInput $input, CompletionSuggestions $suggestions): void
    {
        $values = $this->suggestedValues;
        if ($values instanceof \Closure && !\is_array($values = $values($input))) {
            throw new LogicException(sprintf('Closure for argument "%s" must return an array. Got "%s".', $this->name, get_debug_type($values)));
        }
        if ($values) {
            $suggestions->suggestValues($values);
        }
    }

    /**
     * Returns the description text.
     */
    public function getDescription(): string
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->description;
    }
}
