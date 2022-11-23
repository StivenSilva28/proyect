<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Translation\Exception;

use Symfony\Contracts\HttpClient\ResponseInterface;

/**
 * @author Fabien Potencier <fabien@symfony.com>
 */
class ProviderException extends RuntimeException implements ProviderExceptionInterface
{
<<<<<<< HEAD
    private $response;
    private $debug;
=======
    private ResponseInterface $response;
    private string $debug;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    public function __construct(string $message, ResponseInterface $response, int $code = 0, \Exception $previous = null)
    {
        $this->response = $response;
        $this->debug = $response->getInfo('debug') ?? '';

        parent::__construct($message, $code, $previous);
    }

    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }

    public function getDebug(): string
    {
        return $this->debug;
    }
}
