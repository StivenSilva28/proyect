<?php

declare(strict_types=1);

namespace NunoMaduro\Collision;

use NunoMaduro\Collision\Contracts\ArgumentFormatter as ArgumentFormatterContract;

/**
 * @internal
 *
 * @see \Tests\Unit\ArgumentFormatterTest
 */
final class ArgumentFormatter implements ArgumentFormatterContract
{
    private const MAX_STRING_LENGTH = 1000;

    /**
     * {@inheritdoc}
     */
    public function format(array $arguments, bool $recursive = true): string
    {
        $result = [];

        foreach ($arguments as $argument) {
            switch (true) {
                case is_string($argument):
<<<<<<< HEAD
                    $result[] = '"' . (mb_strlen($argument) > self::MAX_STRING_LENGTH ? mb_substr($argument, 0, self::MAX_STRING_LENGTH) . '...' : $argument) . '"';
=======
                    $result[] = '"'.(mb_strlen($argument) > self::MAX_STRING_LENGTH ? mb_substr($argument, 0, self::MAX_STRING_LENGTH).'...' : $argument).'"';
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
                    break;
                case is_array($argument):
                    $associative = array_keys($argument) !== range(0, count($argument) - 1);
                    if ($recursive && $associative && count($argument) <= 5) {
<<<<<<< HEAD
                        $result[] = '[' . $this->format($argument, false) . ']';
                    }
                    break;
                case is_object($argument):
                    $class    = get_class($argument);
=======
                        $result[] = '['.$this->format($argument, false).']';
                    }
                    break;
                case is_object($argument):
                    $class = get_class($argument);
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
                    $result[] = "Object($class)";
                    break;
            }
        }

        return implode(', ', $result);
    }
}
