<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Routing\Matcher;

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\NoConfigurationException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContextAwareInterface;

/**
 * UrlMatcherInterface is the interface that all URL matcher classes must implement.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
interface UrlMatcherInterface extends RequestContextAwareInterface
{
    /**
     * Tries to match a URL path with a set of routes.
     *
     * If the matcher cannot find information, it must throw one of the exceptions documented
     * below.
     *
     * @param string $pathinfo The path info to be parsed (raw format, i.e. not urldecoded)
     *
<<<<<<< HEAD
     * @return array
     *
=======
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * @throws NoConfigurationException  If no routing configuration could be found
     * @throws ResourceNotFoundException If the resource could not be found
     * @throws MethodNotAllowedException If the resource was found but the request method is not allowed
     */
<<<<<<< HEAD
    public function match(string $pathinfo);
=======
    public function match(string $pathinfo): array;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
}
