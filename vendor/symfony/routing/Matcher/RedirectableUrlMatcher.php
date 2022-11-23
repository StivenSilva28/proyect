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

use Symfony\Component\Routing\Exception\ExceptionInterface;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

/**
 * @author Fabien Potencier <fabien@symfony.com>
 */
abstract class RedirectableUrlMatcher extends UrlMatcher implements RedirectableUrlMatcherInterface
{
    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function match(string $pathinfo)
=======
    public function match(string $pathinfo): array
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        try {
            return parent::match($pathinfo);
        } catch (ResourceNotFoundException $e) {
            if (!\in_array($this->context->getMethod(), ['HEAD', 'GET'], true)) {
                throw $e;
            }

            if ($this->allowSchemes) {
                redirect_scheme:
                $scheme = $this->context->getScheme();
                $this->context->setScheme(current($this->allowSchemes));
                try {
                    $ret = parent::match($pathinfo);

                    return $this->redirect($pathinfo, $ret['_route'] ?? null, $this->context->getScheme()) + $ret;
<<<<<<< HEAD
                } catch (ExceptionInterface $e2) {
=======
                } catch (ExceptionInterface) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
                    throw $e;
                } finally {
                    $this->context->setScheme($scheme);
                }
            } elseif ('/' === $trimmedPathinfo = rtrim($pathinfo, '/') ?: '/') {
                throw $e;
            } else {
                try {
                    $pathinfo = $trimmedPathinfo === $pathinfo ? $pathinfo.'/' : $trimmedPathinfo;
                    $ret = parent::match($pathinfo);

                    return $this->redirect($pathinfo, $ret['_route'] ?? null) + $ret;
<<<<<<< HEAD
                } catch (ExceptionInterface $e2) {
=======
                } catch (ExceptionInterface) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
                    if ($this->allowSchemes) {
                        goto redirect_scheme;
                    }
                    throw $e;
                }
            }
        }
    }
}