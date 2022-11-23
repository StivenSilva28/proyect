<?php

namespace Illuminate\Http\Exceptions;

use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;

class PostTooLargeException extends HttpException
{
    /**
     * Create a new "post too large" exception instance.
     *
<<<<<<< HEAD
     * @param  string|null  $message
=======
     * @param  string  $message
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * @param  \Throwable|null  $previous
     * @param  array  $headers
     * @param  int  $code
     * @return void
     */
<<<<<<< HEAD
    public function __construct($message = null, Throwable $previous = null, array $headers = [], $code = 0)
=======
    public function __construct($message = '', Throwable $previous = null, array $headers = [], $code = 0)
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        parent::__construct(413, $message, $previous, $headers, $code);
    }
}
