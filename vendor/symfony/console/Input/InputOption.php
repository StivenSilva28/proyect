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
 * Represents a command line option.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class InputOption
{
    /**
     * Do not accept input for the option (e.g. --yell). This is the default behavior of options.
     */
    public const VALUE_NONE = 1;

    /**
     * A value must be passed when the option is used (e.g. --iterations=5 or -i5).
     */
    public const VALUE_REQUIRED = 2;

    /**
     * The option may or may not have a value (e.g. --yell or --yell=loud).
     */
    public const VALUE_OPTIONAL = 4;

    /**
     * The option accepts multiple values (e.g. --dir=/foo --dir=/bar).
     */
    public const VALUE_IS_ARRAY = 8;

    /**
     * The option may have either positive or negative value (e.g. --ansi or --no-ansi).
     */
    public const VALUE_NEGATABLE = 16;

<<<<<<< HEAD
    private $name;
    private $shortcut;
    private $mode;
    private $default;
    private $description;
=======
    private string $name;
    private string|array|null $shortcut;
    private int $mode;
    private string|int|bool|array|null|float $default;
    private array|\Closure $suggestedValues;
    private string $description;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * @param string|array|null                $shortcut The shortcuts, can be null, a string of shortcuts delimited by | or an array of shortcuts
     * @param int|null                         $mode     The option mode: One of the VALUE_* constants
     * @param string|bool|int|float|array|null $default  The default value (must be null for self::VALUE_NONE)
<<<<<<< HEAD
     *
     * @throws InvalidArgumentException If option mode is invalid or incompatible
     */
    public function __construct(string $name, $shortcut = null, int $mode = null, string $description = '', $default = null)
=======
     * @param array|\Closure(CompletionInput,CompletionSuggestions):list<string|Suggestion> $suggestedValues The values used for input completion
     *
     * @throws InvalidArgumentException If option mode is invalid or incompatible
     */
    public function __construct(string $name, string|array $shortcut = null, int $mode = null, string $description = '', string|bool|int|float|array $default = null, array|\Closure $suggestedValues = [])
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        if (str_starts_with($name, '--')) {
            $name = substr($name, 2);
        }

        if (empty($name)) {
            throw new InvalidArgumentException('An option name cannot be empty.');
        }

        if (empty($shortcut)) {
            $shortcut = null;
        }

        if (null !== $shortcut) {
            if (\is_array($shortcut)) {
                $shortcut = implode('|', $shortcut);
            }
            $shortcuts = preg_split('{(\|)-?}', ltrim($shortcut, '-'));
            $shortcuts = array_filter($shortcuts);
            $shortcut = implode('|', $shortcuts);

            if (empty($shortcut)) {
                throw new InvalidArgumentException('An option shortcut cannot be empty.');
            }
        }

        if (null === $mode) {
            $mode = self::VALUE_NONE;
        } elseif ($mode >= (self::VALUE_NEGATABLE << 1) || $mode < 1) {
            throw new InvalidArgumentException(sprintf('Option mode "%s" is not valid.', $mode));
        }

        $this->name = $name;
        $this->shortcut = $shortcut;
        $this->mode = $mode;
        $this->description = $description;
<<<<<<< HEAD

=======
        $this->suggestedValues = $suggestedValues;

        if ($suggestedValues && !$this->acceptValue()) {
            throw new LogicException('Cannot set suggested values if the option does not accept a value.');
        }
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
        if ($this->isArray() && !$this->acceptValue()) {
            throw new InvalidArgumentException('Impossible to have an option mode VALUE_IS_ARRAY if the option does not accept a value.');
        }
        if ($this->isNegatable() && $this->acceptValue()) {
            throw new InvalidArgumentException('Impossible to have an option mode VALUE_NEGATABLE if the option also accepts a value.');
        }

        $this->setDefault($default);
    }

    /**
     * Returns the option shortcut.
<<<<<<< HEAD
     *
     * @return string|null
     */
    public function getShortcut()
=======
     */
    public function getShortcut(): ?string
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->shortcut;
    }

    /**
     * Returns the option name.
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
     * Returns true if the option accepts a value.
     *
     * @return bool true if value mode is not self::VALUE_NONE, false otherwise
     */
<<<<<<< HEAD
    public function acceptValue()
=======
    public function acceptValue(): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->isValueRequired() || $this->isValueOptional();
    }

    /**
     * Returns true if the option requires a value.
     *
     * @return bool true if value mode is self::VALUE_REQUIRED, false otherwise
     */
<<<<<<< HEAD
    public function isValueRequired()
=======
    public function isValueRequired(): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return self::VALUE_REQUIRED === (self::VALUE_REQUIRED & $this->mode);
    }

    /**
     * Returns true if the option takes an optional value.
     *
     * @return bool true if value mode is self::VALUE_OPTIONAL, false otherwise
     */
<<<<<<< HEAD
    public function isValueOptional()
=======
    public function isValueOptional(): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return self::VALUE_OPTIONAL === (self::VALUE_OPTIONAL & $this->mode);
    }

    /**
     * Returns true if the option can take multiple values.
     *
     * @return bool true if mode is self::VALUE_IS_ARRAY, false otherwise
     */
<<<<<<< HEAD
    public function isArray()
=======
    public function isArray(): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return self::VALUE_IS_ARRAY === (self::VALUE_IS_ARRAY & $this->mode);
    }

    public function isNegatable(): bool
    {
        return self::VALUE_NEGATABLE === (self::VALUE_NEGATABLE & $this->mode);
    }

<<<<<<< HEAD
    /**
     * @param string|bool|int|float|array|null $default
     */
    public function setDefault($default = null)
=======
    public function setDefault(string|bool|int|float|array $default = null)
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        if (self::VALUE_NONE === (self::VALUE_NONE & $this->mode) && null !== $default) {
            throw new LogicException('Cannot set a default value when using InputOption::VALUE_NONE mode.');
        }

        if ($this->isArray()) {
            if (null === $default) {
                $default = [];
            } elseif (!\is_array($default)) {
                throw new LogicException('A default value for an array option must be an array.');
            }
        }

        $this->default = $this->acceptValue() || $this->isNegatable() ? $default : false;
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

    /**
     * Returns the description text.
<<<<<<< HEAD
     *
     * @return string
     */
    public function getDescription()
=======
     */
    public function getDescription(): string
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->description;
    }

<<<<<<< HEAD
    /**
     * Checks whether the given option equals this one.
     *
     * @return bool
     */
    public function equals(self $option)
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
            throw new LogicException(sprintf('Closure for option "%s" must return an array. Got "%s".', $this->name, get_debug_type($values)));
        }
        if ($values) {
            $suggestions->suggestValues($values);
        }
    }

    /**
     * Checks whether the given option equals this one.
     */
    public function equals(self $option): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $option->getName() === $this->getName()
            && $option->getShortcut() === $this->getShortcut()
            && $option->getDefault() === $this->getDefault()
            && $option->isNegatable() === $this->isNegatable()
            && $option->isArray() === $this->isArray()
            && $option->isValueRequired() === $this->isValueRequired()
            && $option->isValueOptional() === $this->isValueOptional()
        ;
    }
}
