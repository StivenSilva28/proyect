<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\Event;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Contracts\EventDispatcher\Event;

/**
 * Base class for events thrown in the HttpKernel component.
 *
 * @author Bernhard Schussek <bschussek@gmail.com>
 */
class KernelEvent extends Event
{
<<<<<<< HEAD
    private $kernel;
    private $request;
    private $requestType;
=======
    private HttpKernelInterface $kernel;
    private Request $request;
    private ?int $requestType;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * @param int $requestType The request type the kernel is currently processing; one of
     *                         HttpKernelInterface::MAIN_REQUEST or HttpKernelInterface::SUB_REQUEST
     */
    public function __construct(HttpKernelInterface $kernel, Request $request, ?int $requestType)
    {
        $this->kernel = $kernel;
        $this->request = $request;
        $this->requestType = $requestType;
    }

    /**
     * Returns the kernel in which this event was thrown.
<<<<<<< HEAD
     *
     * @return HttpKernelInterface
     */
    public function getKernel()
=======
     */
    public function getKernel(): HttpKernelInterface
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->kernel;
    }

    /**
     * Returns the request the kernel is currently processing.
<<<<<<< HEAD
     *
     * @return Request
     */
    public function getRequest()
=======
     */
    public function getRequest(): Request
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->request;
    }

    /**
     * Returns the request type the kernel is currently processing.
     *
     * @return int One of HttpKernelInterface::MAIN_REQUEST and
     *             HttpKernelInterface::SUB_REQUEST
     */
<<<<<<< HEAD
    public function getRequestType()
=======
    public function getRequestType(): int
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->requestType;
    }

    /**
     * Checks if this is the main request.
     */
    public function isMainRequest(): bool
    {
        return HttpKernelInterface::MAIN_REQUEST === $this->requestType;
    }
<<<<<<< HEAD

    /**
     * Checks if this is a master request.
     *
     * @return bool
     *
     * @deprecated since symfony/http-kernel 5.3, use isMainRequest() instead
     */
    public function isMasterRequest()
    {
        trigger_deprecation('symfony/http-kernel', '5.3', '"%s()" is deprecated, use "isMainRequest()" instead.', __METHOD__);

        return $this->isMainRequest();
    }
=======
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
}
