<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Console\Completion;

use Symfony\Component\Console\Input\InputOption;

/**
 * Stores all completion suggestions for the current input.
 *
 * @author Wouter de Jong <wouter@wouterj.nl>
 */
final class CompletionSuggestions
{
    private $valueSuggestions = [];
    private $optionSuggestions = [];

    /**
     * Add a suggested value for an input option or argument.
     *
<<<<<<< HEAD
     * @param string|Suggestion $value
     *
     * @return $this
     */
    public function suggestValue($value): self
=======
     * @return $this
     */
    public function suggestValue(string|Suggestion $value): static
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->valueSuggestions[] = !$value instanceof Suggestion ? new Suggestion($value) : $value;

        return $this;
    }

    /**
     * Add multiple suggested values at once for an input option or argument.
     *
     * @param list<string|Suggestion> $values
     *
     * @return $this
     */
<<<<<<< HEAD
    public function suggestValues(array $values): self
=======
    public function suggestValues(array $values): static
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        foreach ($values as $value) {
            $this->suggestValue($value);
        }

        return $this;
    }

    /**
     * Add a suggestion for an input option name.
     *
     * @return $this
     */
<<<<<<< HEAD
    public function suggestOption(InputOption $option): self
=======
    public function suggestOption(InputOption $option): static
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->optionSuggestions[] = $option;

        return $this;
    }

    /**
     * Add multiple suggestions for input option names at once.
     *
     * @param InputOption[] $options
     *
     * @return $this
     */
<<<<<<< HEAD
    public function suggestOptions(array $options): self
=======
    public function suggestOptions(array $options): static
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        foreach ($options as $option) {
            $this->suggestOption($option);
        }

        return $this;
    }

    /**
     * @return InputOption[]
     */
    public function getOptionSuggestions(): array
    {
        return $this->optionSuggestions;
    }

    /**
     * @return Suggestion[]
     */
    public function getValueSuggestions(): array
    {
        return $this->valueSuggestions;
    }
}
