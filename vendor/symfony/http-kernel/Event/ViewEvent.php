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

/**
 * Allows to create a response for the return value of a controller.
 *
 * Call setResponse() to set the response that will be returned for the
 * current request. The propagation of this event is stopped as soon as a
 * response is set.
 *
 * @author Bernhard Schussek <bschussek@gmail.com>
 */
final class ViewEvent extends RequestEvent
{
<<<<<<< HEAD
    /**
     * The return value of the controller.
     *
     * @var mixed
     */
    private $controllerResult;

    public function __construct(HttpKernelInterface $kernel, Request $request, int $requestType, $controllerResult)
=======
    private mixed $controllerResult;

    public function __construct(HttpKernelInterface $kernel, Request $request, int $requestType, mixed $controllerResult)
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        parent::__construct($kernel, $request, $requestType);

        $this->controllerResult = $controllerResult;
    }

<<<<<<< HEAD
    /**
     * Returns the return value of the controller.
     *
     * @return mixed
     */
    public function getControllerResult()
=======
    public function getControllerResult(): mixed
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->controllerResult;
    }

<<<<<<< HEAD
    /**
     * Assigns the return value of the controller.
     *
     * @param mixed $controllerResult The controller return value
     */
    public function setControllerResult($controllerResult): void
=======
    public function setControllerResult(mixed $controllerResult): void
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->controllerResult = $controllerResult;
    }
}