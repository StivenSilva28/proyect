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
class TraceableArgumentResolver implements ArgumentResolverInterface
{
<<<<<<< HEAD
    private $resolver;
    private $stopwatch;
=======
    private ArgumentResolverInterface $resolver;
    private Stopwatch $stopwatch;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    public function __construct(ArgumentResolverInterface $resolver, Stopwatch $stopwatch)
    {
        $this->resolver = $resolver;
        $this->stopwatch = $stopwatch;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function getArguments(Request $request, callable $controller)
=======
    public function getArguments(Request $request, callable $controller): array
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $e = $this->stopwatch->start('controller.get_arguments');

        $ret = $this->resolver->getArguments($request, $controller);

        $e->stop();

        return $ret;
    }
}
