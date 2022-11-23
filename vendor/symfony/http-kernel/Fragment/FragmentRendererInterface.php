<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\Fragment;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Controller\ControllerReference;

/**
 * Interface implemented by all rendering strategies.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
interface FragmentRendererInterface
{
    /**
     * Renders a URI and returns the Response content.
<<<<<<< HEAD
     *
     * @param string|ControllerReference $uri A URI as a string or a ControllerReference instance
     *
     * @return Response
     */
    public function render($uri, Request $request, array $options = []);

    /**
     * Gets the name of the strategy.
     *
     * @return string
     */
    public function getName();
=======
     */
    public function render(string|ControllerReference $uri, Request $request, array $options = []): Response;

    /**
     * Gets the name of the strategy.
     */
    public function getName(): string;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
}