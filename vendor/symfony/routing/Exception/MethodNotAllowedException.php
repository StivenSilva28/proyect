<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Routing\Exception;

/**
 * The resource was found but the request method is not allowed.
 *
 * This exception should trigger an HTTP 405 response in your application code.
 *
 * @author Kris Wallsmith <kris@symfony.com>
 */
class MethodNotAllowedException extends \RuntimeException implements ExceptionInterface
{
    protected $allowedMethods = [];

    /**
     * @param string[] $allowedMethods
     */
<<<<<<< HEAD
    public function __construct(array $allowedMethods, ?string $message = '', int $code = 0, \Throwable $previous = null)
    {
        if (null === $message) {
            trigger_deprecation('symfony/routing', '5.3', 'Passing null as $message to "%s()" is deprecated, pass an empty string instead.', __METHOD__);

            $message = '';
        }

=======
    public function __construct(array $allowedMethods, string $message = '', int $code = 0, \Throwable $previous = null)
    {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
        $this->allowedMethods = array_map('strtoupper', $allowedMethods);

        parent::__construct($message, $code, $previous);
    }

    /**
     * Gets the allowed HTTP methods.
     *
     * @return string[]
     */
<<<<<<< HEAD
    public function getAllowedMethods()
=======
    public function getAllowedMethods(): array
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->allowedMethods;
    }
}
