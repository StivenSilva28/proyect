<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Console\Exception;

/**
 * Represents an incorrect command name typed in the console.
 *
 * @author Jérôme Tamarelle <jerome@tamarelle.net>
 */
class CommandNotFoundException extends \InvalidArgumentException implements ExceptionInterface
{
<<<<<<< HEAD
    private $alternatives;
=======
    private array $alternatives;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * @param string          $message      Exception message to throw
     * @param string[]        $alternatives List of similar defined names
     * @param int             $code         Exception code
     * @param \Throwable|null $previous     Previous exception used for the exception chaining
     */
    public function __construct(string $message, array $alternatives = [], int $code = 0, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);

        $this->alternatives = $alternatives;
    }

    /**
     * @return string[]
     */
<<<<<<< HEAD
    public function getAlternatives()
=======
    public function getAlternatives(): array
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->alternatives;
    }
}
