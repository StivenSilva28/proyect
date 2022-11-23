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
 * InputInterface is the interface implemented by all input classes.
 *
 * @author Fabien Potencier <fabien@symfony.com>
<<<<<<< HEAD
=======
 *
 * @method string __toString() Returns a stringified representation of the args passed to the command.
 *                             InputArguments MUST be escaped as well as the InputOption values passed to the command.
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
 */
interface InputInterface
{
    /**
     * Returns the first argument from the raw parameters (not parsed).
<<<<<<< HEAD
     *
     * @return string|null
     */
    public function getFirstArgument();
=======
     */
    public function getFirstArgument(): ?string;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * Returns true if the raw parameters (not parsed) contain a value.
     *
     * This method is to be used to introspect the input parameters
     * before they have been validated. It must be used carefully.
     * Does not necessarily return the correct result for short options
     * when multiple flags are combined in the same option.
     *
     * @param string|array $values     The values to look for in the raw parameters (can be an array)
     * @param bool         $onlyParams Only check real parameters, skip those following an end of options (--) signal
<<<<<<< HEAD
     *
     * @return bool
     */
    public function hasParameterOption($values, bool $onlyParams = false);
=======
     */
    public function hasParameterOption(string|array $values, bool $onlyParams = false): bool;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * Returns the value of a raw option (not parsed).
     *
     * This method is to be used to introspect the input parameters
     * before they have been validated. It must be used carefully.
     * Does not necessarily return the correct result for short options
     * when multiple flags are combined in the same option.
     *
     * @param string|array                     $values     The value(s) to look for in the raw parameters (can be an array)
     * @param string|bool|int|float|array|null $default    The default value to return if no result is found
     * @param bool                             $onlyParams Only check real parameters, skip those following an end of options (--) signal
     *
     * @return mixed
     */
<<<<<<< HEAD
    public function getParameterOption($values, $default = false, bool $onlyParams = false);
=======
    public function getParameterOption(string|array $values, string|bool|int|float|array|null $default = false, bool $onlyParams = false);
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * Binds the current Input instance with the given arguments and options.
     *
     * @throws RuntimeException
     */
    public function bind(InputDefinition $definition);

    /**
     * Validates the input.
     *
     * @throws RuntimeException When not enough arguments are given
     */
    public function validate();

    /**
     * Returns all the given arguments merged with the default values.
     *
     * @return array<string|bool|int|float|array|null>
     */
<<<<<<< HEAD
    public function getArguments();
=======
    public function getArguments(): array;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * Returns the argument value for a given argument name.
     *
     * @return mixed
     *
     * @throws InvalidArgumentException When argument given doesn't exist
     */
    public function getArgument(string $name);

    /**
     * Sets an argument value by name.
     *
<<<<<<< HEAD
     * @param mixed $value The argument value
     *
     * @throws InvalidArgumentException When argument given doesn't exist
     */
    public function setArgument(string $name, $value);

    /**
     * Returns true if an InputArgument object exists by name or position.
     *
     * @return bool
     */
    public function hasArgument(string $name);
=======
     * @throws InvalidArgumentException When argument given doesn't exist
     */
    public function setArgument(string $name, mixed $value);

    /**
     * Returns true if an InputArgument object exists by name or position.
     */
    public function hasArgument(string $name): bool;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * Returns all the given options merged with the default values.
     *
     * @return array<string|bool|int|float|array|null>
     */
<<<<<<< HEAD
    public function getOptions();
=======
    public function getOptions(): array;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * Returns the option value for a given option name.
     *
     * @return mixed
     *
     * @throws InvalidArgumentException When option given doesn't exist
     */
    public function getOption(string $name);

    /**
     * Sets an option value by name.
     *
<<<<<<< HEAD
     * @param mixed $value The option value
     *
     * @throws InvalidArgumentException When option given doesn't exist
     */
    public function setOption(string $name, $value);

    /**
     * Returns true if an InputOption object exists by name.
     *
     * @return bool
     */
    public function hasOption(string $name);

    /**
     * Is this input means interactive?
     *
     * @return bool
     */
    public function isInteractive();
=======
     * @throws InvalidArgumentException When option given doesn't exist
     */
    public function setOption(string $name, mixed $value);

    /**
     * Returns true if an InputOption object exists by name.
     */
    public function hasOption(string $name): bool;

    /**
     * Is this input means interactive?
     */
    public function isInteractive(): bool;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * Sets the input interactivity.
     */
    public function setInteractive(bool $interactive);
}
