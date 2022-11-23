<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\Exception;

/**
 * @author Steve Hutchins <hutchinsteve@gmail.com>
 */
class UnprocessableEntityHttpException extends HttpException
{
<<<<<<< HEAD
    /**
     * @param string|null     $message  The internal exception message
     * @param \Throwable|null $previous The previous exception
     * @param int             $code     The internal exception code
     */
    public function __construct(?string $message = '', \Throwable $previous = null, int $code = 0, array $headers = [])
    {
        if (null === $message) {
            trigger_deprecation('symfony/http-kernel', '5.3', 'Passing null as $message to "%s()" is deprecated, pass an empty string instead.', __METHOD__);

            $message = '';
        }

=======
    public function __construct(string $message = '', \Throwable $previous = null, int $code = 0, array $headers = [])
    {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
        parent::__construct(422, $message, $previous, $headers, $code);
    }
}
