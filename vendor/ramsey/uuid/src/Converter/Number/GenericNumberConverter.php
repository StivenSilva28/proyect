<?php

/**
 * This file is part of the ramsey/uuid library
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright Copyright (c) Ben Ramsey <ben@benramsey.com>
 * @license http://opensource.org/licenses/MIT MIT
 */

declare(strict_types=1);

namespace Ramsey\Uuid\Converter\Number;

use Ramsey\Uuid\Converter\NumberConverterInterface;
use Ramsey\Uuid\Math\CalculatorInterface;
use Ramsey\Uuid\Type\Integer as IntegerObject;

/**
 * GenericNumberConverter uses the provided calculator to convert decimal
 * numbers to and from hexadecimal values
 *
 * @psalm-immutable
 */
class GenericNumberConverter implements NumberConverterInterface
{
<<<<<<< HEAD
    /**
     * @var CalculatorInterface
     */
    private $calculator;

    public function __construct(CalculatorInterface $calculator)
    {
        $this->calculator = $calculator;
=======
    public function __construct(private CalculatorInterface $calculator)
    {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }

    /**
     * @inheritDoc
     * @psalm-pure
     * @psalm-return numeric-string
     * @psalm-suppress MoreSpecificReturnType we know that the retrieved `string` is never empty
     * @psalm-suppress LessSpecificReturnStatement we know that the retrieved `string` is never empty
     */
    public function fromHex(string $hex): string
    {
        return $this->calculator->fromBase($hex, 16)->toString();
    }

    /**
     * @inheritDoc
     * @psalm-pure
     * @psalm-return non-empty-string
     * @psalm-suppress MoreSpecificReturnType we know that the retrieved `string` is never empty
     * @psalm-suppress LessSpecificReturnStatement we know that the retrieved `string` is never empty
     */
    public function toHex(string $number): string
    {
        /** @phpstan-ignore-next-line PHPStan complains that this is not a non-empty-string. */
        return $this->calculator->toBase(new IntegerObject($number), 16);
    }
}
