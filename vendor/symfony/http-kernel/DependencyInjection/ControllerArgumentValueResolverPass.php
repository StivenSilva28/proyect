<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\DependencyInjection;

use Symfony\Component\DependencyInjection\Argument\IteratorArgument;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Compiler\PriorityTaggedServiceTrait;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver\TraceableValueResolver;
use Symfony\Component\Stopwatch\Stopwatch;

/**
 * Gathers and configures the argument value resolvers.
 *
 * @author Iltar van der Berg <kjarli@gmail.com>
 */
class ControllerArgumentValueResolverPass implements CompilerPassInterface
{
    use PriorityTaggedServiceTrait;

<<<<<<< HEAD
    private $argumentResolverService;
    private $argumentValueResolverTag;
    private $traceableResolverStopwatch;

    public function __construct(string $argumentResolverService = 'argument_resolver', string $argumentValueResolverTag = 'controller.argument_value_resolver', string $traceableResolverStopwatch = 'debug.stopwatch')
    {
        if (0 < \func_num_args()) {
            trigger_deprecation('symfony/http-kernel', '5.3', 'Configuring "%s" is deprecated.', __CLASS__);
        }

        $this->argumentResolverService = $argumentResolverService;
        $this->argumentValueResolverTag = $argumentValueResolverTag;
        $this->traceableResolverStopwatch = $traceableResolverStopwatch;
    }

    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition($this->argumentResolverService)) {
            return;
        }

        $resolvers = $this->findAndSortTaggedServices($this->argumentValueResolverTag, $container);

        if ($container->getParameter('kernel.debug') && class_exists(Stopwatch::class) && $container->has($this->traceableResolverStopwatch)) {
=======
    public function process(ContainerBuilder $container)
    {
        if (!$container->hasDefinition('argument_resolver')) {
            return;
        }

        $resolvers = $this->findAndSortTaggedServices('controller.argument_value_resolver', $container);

        if ($container->getParameter('kernel.debug') && class_exists(Stopwatch::class) && $container->has('debug.stopwatch')) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            foreach ($resolvers as $resolverReference) {
                $id = (string) $resolverReference;
                $container->register("debug.$id", TraceableValueResolver::class)
                    ->setDecoratedService($id)
<<<<<<< HEAD
                    ->setArguments([new Reference("debug.$id.inner"), new Reference($this->traceableResolverStopwatch)]);
=======
                    ->setArguments([new Reference("debug.$id.inner"), new Reference('debug.stopwatch')]);
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            }
        }

        $container
<<<<<<< HEAD
            ->getDefinition($this->argumentResolverService)
=======
            ->getDefinition('argument_resolver')
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            ->replaceArgument(1, new IteratorArgument($resolvers))
        ;
    }
}
