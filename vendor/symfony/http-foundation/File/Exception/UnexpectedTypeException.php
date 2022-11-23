<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpFoundation\File\Exception;

class UnexpectedTypeException extends FileException
{
<<<<<<< HEAD
    public function __construct($value, string $expectedType)
=======
    public function __construct(mixed $value, string $expectedType)
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        parent::__construct(sprintf('Expected argument of type %s, %s given', $expectedType, get_debug_type($value)));
    }
}
