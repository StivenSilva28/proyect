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

use Psr\Log\AbstractLogger;

/**
 * A buffering logger that stacks logs for later.
 *
 * @author Nicolas Grekas <p@tchwork.com>
 */
class BufferingLogger extends AbstractLogger
{
<<<<<<< HEAD
    private $logs = [];
=======
    private array $logs = [];
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    public function log($level, $message, array $context = []): void
    {
        $this->logs[] = [$level, $message, $context];
    }

    public function cleanLogs(): array
    {
        $logs = $this->logs;
        $this->logs = [];

        return $logs;
    }

<<<<<<< HEAD
    /**
     * @return array
     */
    public function __sleep()
=======
    public function __sleep(): array
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        throw new \BadMethodCallException('Cannot serialize '.__CLASS__);
    }

    public function __wakeup()
    {
        throw new \BadMethodCallException('Cannot unserialize '.__CLASS__);
    }

    public function __destruct()
    {
        foreach ($this->logs as [$level, $message, $context]) {
<<<<<<< HEAD
            if (false !== strpos($message, '{')) {
=======
            if (str_contains($message, '{')) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
                foreach ($context as $key => $val) {
                    if (null === $val || \is_scalar($val) || (\is_object($val) && \is_callable([$val, '__toString']))) {
                        $message = str_replace("{{$key}}", $val, $message);
                    } elseif ($val instanceof \DateTimeInterface) {
                        $message = str_replace("{{$key}}", $val->format(\DateTime::RFC3339), $message);
                    } elseif (\is_object($val)) {
<<<<<<< HEAD
                        $message = str_replace("{{$key}}", '[object '.\get_class($val).']', $message);
=======
                        $message = str_replace("{{$key}}", '[object '.get_debug_type($val).']', $message);
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
                    } else {
                        $message = str_replace("{{$key}}", '['.\gettype($val).']', $message);
                    }
                }
            }

            error_log(sprintf('%s [%s] %s', date(\DateTime::RFC3339), $level, $message));
        }
    }
}
