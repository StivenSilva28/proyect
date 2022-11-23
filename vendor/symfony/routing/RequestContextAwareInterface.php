<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Routing;

interface RequestContextAwareInterface
{
    /**
     * Sets the request context.
     */
    public function setContext(RequestContext $context);

    /**
     * Gets the request context.
<<<<<<< HEAD
     *
     * @return RequestContext
     */
    public function getContext();
=======
     */
    public function getContext(): RequestContext;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
}
