<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\ControllerMetadata;

<<<<<<< HEAD
use Symfony\Component\HttpKernel\Attribute\ArgumentInterface;

=======
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
/**
 * Responsible for storing metadata of an argument.
 *
 * @author Iltar van der Berg <kjarli@gmail.com>
 */
class ArgumentMetadata
{
    public const IS_INSTANCEOF = 2;

<<<<<<< HEAD
    private $name;
    private $type;
    private $isVariadic;
    private $hasDefaultValue;
    private $defaultValue;
    private $isNullable;
    private $attributes;
=======
    private string $name;
    private ?string $type;
    private bool $isVariadic;
    private bool $hasDefaultValue;
    private mixed $defaultValue;
    private bool $isNullable;
    private array $attributes;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * @param object[] $attributes
     */
<<<<<<< HEAD
    public function __construct(string $name, ?string $type, bool $isVariadic, bool $hasDefaultValue, $defaultValue, bool $isNullable = false, $attributes = [])
=======
    public function __construct(string $name, ?string $type, bool $isVariadic, bool $hasDefaultValue, mixed $defaultValue, bool $isNullable = false, array $attributes = [])
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->name = $name;
        $this->type = $type;
        $this->isVariadic = $isVariadic;
        $this->hasDefaultValue = $hasDefaultValue;
        $this->defaultValue = $defaultValue;
        $this->isNullable = $isNullable || null === $type || ($hasDefaultValue && null === $defaultValue);
<<<<<<< HEAD

        if (null === $attributes || $attributes instanceof ArgumentInterface) {
            trigger_deprecation('symfony/http-kernel', '5.3', 'The "%s" constructor expects an array of PHP attributes as last argument, %s given.', __CLASS__, get_debug_type($attributes));
            $attributes = $attributes ? [$attributes] : [];
        }

=======
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
        $this->attributes = $attributes;
    }

    /**
     * Returns the name as given in PHP, $foo would yield "foo".
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
     * Returns the type of the argument.
     *
     * The type is the PHP class in 5.5+ and additionally the basic type in PHP 7.0+.
<<<<<<< HEAD
     *
     * @return string|null
     */
    public function getType()
=======
     */
    public function getType(): ?string
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->type;
    }

    /**
     * Returns whether the argument is defined as "...$variadic".
<<<<<<< HEAD
     *
     * @return bool
     */
    public function isVariadic()
=======
     */
    public function isVariadic(): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->isVariadic;
    }

    /**
     * Returns whether the argument has a default value.
     *
     * Implies whether an argument is optional.
<<<<<<< HEAD
     *
     * @return bool
     */
    public function hasDefaultValue()
=======
     */
    public function hasDefaultValue(): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->hasDefaultValue;
    }

    /**
     * Returns whether the argument accepts null values.
<<<<<<< HEAD
     *
     * @return bool
     */
    public function isNullable()
=======
     */
    public function isNullable(): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->isNullable;
    }

    /**
     * Returns the default value of the argument.
     *
     * @throws \LogicException if no default value is present; {@see self::hasDefaultValue()}
<<<<<<< HEAD
     *
     * @return mixed
     */
    public function getDefaultValue()
=======
     */
    public function getDefaultValue(): mixed
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        if (!$this->hasDefaultValue) {
            throw new \LogicException(sprintf('Argument $%s does not have a default value. Use "%s::hasDefaultValue()" to avoid this exception.', $this->name, __CLASS__));
        }

        return $this->defaultValue;
    }

    /**
<<<<<<< HEAD
     * Returns the attribute (if any) that was set on the argument.
     */
    public function getAttribute(): ?ArgumentInterface
    {
        trigger_deprecation('symfony/http-kernel', '5.3', 'Method "%s()" is deprecated, use "getAttributes()" instead.', __METHOD__);

        if (!$this->attributes) {
            return null;
        }

        return $this->attributes[0] instanceof ArgumentInterface ? $this->attributes[0] : null;
    }

    /**
     * @return object[]
=======
     * @param class-string          $name
     * @param self::IS_INSTANCEOF|0 $flags
     *
     * @return array<object>
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    public function getAttributes(string $name = null, int $flags = 0): array
    {
        if (!$name) {
            return $this->attributes;
        }

<<<<<<< HEAD
=======
        return $this->getAttributesOfType($name, $flags);
    }

    /**
     * @template T of object
     *
     * @param class-string<T>       $name
     * @param self::IS_INSTANCEOF|0 $flags
     *
     * @return array<T>
     */
    public function getAttributesOfType(string $name, int $flags = 0): array
    {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
        $attributes = [];
        if ($flags & self::IS_INSTANCEOF) {
            foreach ($this->attributes as $attribute) {
                if ($attribute instanceof $name) {
                    $attributes[] = $attribute;
                }
            }
        } else {
            foreach ($this->attributes as $attribute) {
                if (\get_class($attribute) === $name) {
                    $attributes[] = $attribute;
                }
            }
        }

        return $attributes;
    }
}
