<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Finder\Comparator;

/**
 * @author Fabien Potencier <fabien@symfony.com>
 */
class Comparator
{
<<<<<<< HEAD
    private $target;
    private $operator = '==';

    public function __construct(string $target = null, string $operator = '==')
    {
        if (null === $target) {
            trigger_deprecation('symfony/finder', '5.4', 'Constructing a "%s" without setting "$target" is deprecated.', __CLASS__);
        }

        $this->target = $target;
        $this->doSetOperator($operator);
    }

    /**
     * Gets the target value.
     *
     * @return string
     */
    public function getTarget()
    {
        if (null === $this->target) {
            trigger_deprecation('symfony/finder', '5.4', 'Calling "%s" without initializing the target is deprecated.', __METHOD__);
        }

        return $this->target;
    }

    /**
     * @deprecated set the target via the constructor instead
     */
    public function setTarget(string $target)
    {
        trigger_deprecation('symfony/finder', '5.4', '"%s" is deprecated. Set the target via the constructor instead.', __METHOD__);

        $this->target = $target;
    }

    /**
     * Gets the comparison operator.
     *
     * @return string
     */
    public function getOperator()
    {
        return $this->operator;
    }

    /**
     * Sets the comparison operator.
     *
     * @throws \InvalidArgumentException
     *
     * @deprecated set the operator via the constructor instead
     */
    public function setOperator(string $operator)
    {
        trigger_deprecation('symfony/finder', '5.4', '"%s" is deprecated. Set the operator via the constructor instead.', __METHOD__);

        $this->doSetOperator('' === $operator ? '==' : $operator);
    }

    /**
     * Tests against the target.
     *
     * @param mixed $test A test value
     *
     * @return bool
     */
    public function test($test)
    {
        if (null === $this->target) {
            trigger_deprecation('symfony/finder', '5.4', 'Calling "%s" without initializing the target is deprecated.', __METHOD__);
        }

        switch ($this->operator) {
            case '>':
                return $test > $this->target;
            case '>=':
                return $test >= $this->target;
            case '<':
                return $test < $this->target;
            case '<=':
                return $test <= $this->target;
            case '!=':
                return $test != $this->target;
        }

        return $test == $this->target;
    }

    private function doSetOperator(string $operator): void
=======
    private string $target;
    private string $operator;

    public function __construct(string $target, string $operator = '==')
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        if (!\in_array($operator, ['>', '<', '>=', '<=', '==', '!='])) {
            throw new \InvalidArgumentException(sprintf('Invalid operator "%s".', $operator));
        }

<<<<<<< HEAD
        $this->operator = $operator;
    }
=======
        $this->target = $target;
        $this->operator = $operator;
    }

    /**
     * Gets the target value.
     */
    public function getTarget(): string
    {
        return $this->target;
    }

    /**
     * Gets the comparison operator.
     */
    public function getOperator(): string
    {
        return $this->operator;
    }

    /**
     * Tests against the target.
     */
    public function test(mixed $test): bool
    {
        return match ($this->operator) {
            '>' => $test > $this->target,
            '>=' => $test >= $this->target,
            '<' => $test < $this->target,
            '<=' => $test <= $this->target,
            '!=' => $test != $this->target,
            default => $test == $this->target,
        };
    }
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
}
