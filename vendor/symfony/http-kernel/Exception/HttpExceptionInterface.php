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
 * Interface for HTTP error exceptions.
 *
 * @author Kris Wallsmith <kris@symfony.com>
 */
interface HttpExceptionInterface extends \Throwable
{
    /**
     * Returns the status code.
<<<<<<< HEAD
     *
     * @return int
     */
    public function getStatusCode();

    /**
     * Returns response headers.
     *
     * @return array
     */
    public function getHeaders();
=======
     */
    public function getStatusCode(): int;

    /**
     * Returns response headers.
     */
    public function getHeaders(): array;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
}
