<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Console\Question;

use Symfony\Component\Console\Exception\InvalidArgumentException;
use Symfony\Component\Console\Exception\LogicException;

/**
 * Represents a Question.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class Question
{
<<<<<<< HEAD
    private $question;
    private $attempts;
    private $hidden = false;
    private $hiddenFallback = true;
    private $autocompleterCallback;
    private $validator;
    private $default;
    private $normalizer;
    private $trimmable = true;
    private $multiline = false;
=======
    private string $question;
    private ?int $attempts = null;
    private bool $hidden = false;
    private bool $hiddenFallback = true;
    private ?\Closure $autocompleterCallback = null;
    private ?\Closure $validator = null;
    private string|int|bool|null|float $default;
    private ?\Closure $normalizer = null;
    private bool $trimmable = true;
    private bool $multiline = false;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * @param string                     $question The question to ask to the user
     * @param string|bool|int|float|null $default  The default answer to return if the user enters nothing
     */
<<<<<<< HEAD
    public function __construct(string $question, $default = null)
=======
    public function __construct(string $question, string|bool|int|float $default = null)
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->question = $question;
        $this->default = $default;
    }

    /**
     * Returns the question.
<<<<<<< HEAD
     *
     * @return string
     */
    public function getQuestion()
=======
     */
    public function getQuestion(): string
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->question;
    }

    /**
     * Returns the default answer.
<<<<<<< HEAD
     *
     * @return string|bool|int|float|null
     */
    public function getDefault()
=======
     */
    public function getDefault(): string|bool|int|float|null
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->default;
    }

    /**
     * Returns whether the user response accepts newline characters.
     */
    public function isMultiline(): bool
    {
        return $this->multiline;
    }

    /**
     * Sets whether the user response should accept newline characters.
     *
     * @return $this
     */
<<<<<<< HEAD
    public function setMultiline(bool $multiline): self
=======
    public function setMultiline(bool $multiline): static
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->multiline = $multiline;

        return $this;
    }

    /**
     * Returns whether the user response must be hidden.
<<<<<<< HEAD
     *
     * @return bool
     */
    public function isHidden()
=======
     */
    public function isHidden(): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->hidden;
    }

    /**
     * Sets whether the user response must be hidden or not.
     *
     * @return $this
     *
     * @throws LogicException In case the autocompleter is also used
     */
<<<<<<< HEAD
    public function setHidden(bool $hidden)
=======
    public function setHidden(bool $hidden): static
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        if ($this->autocompleterCallback) {
            throw new LogicException('A hidden question cannot use the autocompleter.');
        }

        $this->hidden = $hidden;

        return $this;
    }

    /**
     * In case the response cannot be hidden, whether to fallback on non-hidden question or not.
<<<<<<< HEAD
     *
     * @return bool
     */
    public function isHiddenFallback()
=======
     */
    public function isHiddenFallback(): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->hiddenFallback;
    }

    /**
     * Sets whether to fallback on non-hidden question if the response cannot be hidden.
     *
     * @return $this
     */
<<<<<<< HEAD
    public function setHiddenFallback(bool $fallback)
=======
    public function setHiddenFallback(bool $fallback): static
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->hiddenFallback = $fallback;

        return $this;
    }

    /**
     * Gets values for the autocompleter.
<<<<<<< HEAD
     *
     * @return iterable|null
     */
    public function getAutocompleterValues()
=======
     */
    public function getAutocompleterValues(): ?iterable
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $callback = $this->getAutocompleterCallback();

        return $callback ? $callback('') : null;
    }

    /**
     * Sets values for the autocompleter.
     *
     * @return $this
     *
     * @throws LogicException
     */
<<<<<<< HEAD
    public function setAutocompleterValues(?iterable $values)
=======
    public function setAutocompleterValues(?iterable $values): static
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        if (\is_array($values)) {
            $values = $this->isAssoc($values) ? array_merge(array_keys($values), array_values($values)) : array_values($values);

            $callback = static function () use ($values) {
                return $values;
            };
        } elseif ($values instanceof \Traversable) {
            $valueCache = null;
            $callback = static function () use ($values, &$valueCache) {
<<<<<<< HEAD
                return $valueCache ?? $valueCache = iterator_to_array($values, false);
=======
                return $valueCache ??= iterator_to_array($values, false);
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            };
        } else {
            $callback = null;
        }

        return $this->setAutocompleterCallback($callback);
    }

    /**
     * Gets the callback function used for the autocompleter.
     */
    public function getAutocompleterCallback(): ?callable
    {
        return $this->autocompleterCallback;
    }

    /**
     * Sets the callback function used for the autocompleter.
     *
     * The callback is passed the user input as argument and should return an iterable of corresponding suggestions.
     *
     * @return $this
     */
<<<<<<< HEAD
    public function setAutocompleterCallback(callable $callback = null): self
=======
    public function setAutocompleterCallback(callable $callback = null): static
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        if ($this->hidden && null !== $callback) {
            throw new LogicException('A hidden question cannot use the autocompleter.');
        }

<<<<<<< HEAD
        $this->autocompleterCallback = $callback;
=======
        $this->autocompleterCallback = null === $callback ? null : $callback(...);
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

        return $this;
    }

    /**
     * Sets a validator for the question.
     *
     * @return $this
     */
<<<<<<< HEAD
    public function setValidator(callable $validator = null)
    {
        $this->validator = $validator;
=======
    public function setValidator(callable $validator = null): static
    {
        $this->validator = null === $validator ? null : $validator(...);
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

        return $this;
    }

    /**
     * Gets the validator for the question.
<<<<<<< HEAD
     *
     * @return callable|null
     */
    public function getValidator()
=======
     */
    public function getValidator(): ?callable
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->validator;
    }

    /**
     * Sets the maximum number of attempts.
     *
     * Null means an unlimited number of attempts.
     *
     * @return $this
     *
     * @throws InvalidArgumentException in case the number of attempts is invalid
     */
<<<<<<< HEAD
    public function setMaxAttempts(?int $attempts)
=======
    public function setMaxAttempts(?int $attempts): static
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        if (null !== $attempts && $attempts < 1) {
            throw new InvalidArgumentException('Maximum number of attempts must be a positive value.');
        }

        $this->attempts = $attempts;

        return $this;
    }

    /**
     * Gets the maximum number of attempts.
     *
     * Null means an unlimited number of attempts.
<<<<<<< HEAD
     *
     * @return int|null
     */
    public function getMaxAttempts()
=======
     */
    public function getMaxAttempts(): ?int
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->attempts;
    }

    /**
     * Sets a normalizer for the response.
     *
     * The normalizer can be a callable (a string), a closure or a class implementing __invoke.
     *
     * @return $this
     */
<<<<<<< HEAD
    public function setNormalizer(callable $normalizer)
    {
        $this->normalizer = $normalizer;
=======
    public function setNormalizer(callable $normalizer): static
    {
        $this->normalizer = $normalizer(...);
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

        return $this;
    }

    /**
     * Gets the normalizer for the response.
     *
     * The normalizer can ba a callable (a string), a closure or a class implementing __invoke.
<<<<<<< HEAD
     *
     * @return callable|null
     */
    public function getNormalizer()
=======
     */
    public function getNormalizer(): ?callable
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->normalizer;
    }

    protected function isAssoc(array $array)
    {
        return (bool) \count(array_filter(array_keys($array), 'is_string'));
    }

    public function isTrimmable(): bool
    {
        return $this->trimmable;
    }

    /**
     * @return $this
     */
<<<<<<< HEAD
    public function setTrimmable(bool $trimmable): self
=======
    public function setTrimmable(bool $trimmable): static
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->trimmable = $trimmable;

        return $this;
    }
}
