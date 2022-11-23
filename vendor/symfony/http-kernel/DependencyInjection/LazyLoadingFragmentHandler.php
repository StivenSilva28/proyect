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

use Psr\Container\ContainerInterface;
use Symfony\Component\HttpFoundation\RequestStack;
<<<<<<< HEAD
=======
use Symfony\Component\HttpKernel\Controller\ControllerReference;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
use Symfony\Component\HttpKernel\Fragment\FragmentHandler;

/**
 * Lazily loads fragment renderers from the dependency injection container.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class LazyLoadingFragmentHandler extends FragmentHandler
{
<<<<<<< HEAD
    private $container;
=======
    private ContainerInterface $container;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * @var array<string, bool>
     */
<<<<<<< HEAD
    private $initialized = [];
=======
    private array $initialized = [];
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    public function __construct(ContainerInterface $container, RequestStack $requestStack, bool $debug = false)
    {
        $this->container = $container;

        parent::__construct($requestStack, [], $debug);
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function render($uri, string $renderer = 'inline', array $options = [])
=======
    public function render(string|ControllerReference $uri, string $renderer = 'inline', array $options = []): ?string
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        if (!isset($this->initialized[$renderer]) && $this->container->has($renderer)) {
            $this->addRenderer($this->container->get($renderer));
            $this->initialized[$renderer] = true;
        }

        return parent::render($uri, $renderer, $options);
    }
}
