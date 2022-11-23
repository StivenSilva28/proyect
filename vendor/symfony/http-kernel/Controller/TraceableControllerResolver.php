<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Stopwatch\Stopwatch;

/**
 * @author Fabien Potencier <fabien@symfony.com>
 */
class TraceableControllerResolver implements ControllerResolverInterface
{
<<<<<<< HEAD
    private $resolver;
    private $stopwatch;
=======
    private ControllerResolverInterface $resolver;
    private Stopwatch $stopwatch;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    public function __construct(ControllerResolverInterface $resolver, Stopwatch $stopwatch)
    {
        $this->resolver = $resolver;
        $this->stopwatch = $stopwatch;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function getController(Request $request)
=======
    public function getController(Request $request): callable|false
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $e = $this->stopwatch->start('controller.get_callable');

        $ret = $this->resolver->getController($request);

        $e->stop();

        return $ret;
    }
}
