<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\ErrorHandler;

use Symfony\Component\ErrorHandler\Exception\SilencedErrorContext;

/**
 * @internal
 */
class ThrowableUtils
{
<<<<<<< HEAD
    /**
     * @param SilencedErrorContext|\Throwable
     */
    public static function getSeverity($throwable): int
=======
    public static function getSeverity(SilencedErrorContext|\Throwable $throwable): int
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        if ($throwable instanceof \ErrorException || $throwable instanceof SilencedErrorContext) {
            return $throwable->getSeverity();
        }

        if ($throwable instanceof \ParseError) {
            return \E_PARSE;
        }

        if ($throwable instanceof \TypeError) {
            return \E_RECOVERABLE_ERROR;
        }

        return \E_ERROR;
    }
}
