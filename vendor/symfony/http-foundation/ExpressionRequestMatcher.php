<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpFoundation;

<<<<<<< HEAD
=======
use Symfony\Component\ExpressionLanguage\Expression;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
use Symfony\Component\ExpressionLanguage\ExpressionLanguage;

/**
 * ExpressionRequestMatcher uses an expression to match a Request.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class ExpressionRequestMatcher extends RequestMatcher
{
<<<<<<< HEAD
    private $language;
    private $expression;

    public function setExpression(ExpressionLanguage $language, $expression)
=======
    private ExpressionLanguage $language;
    private Expression|string $expression;

    public function setExpression(ExpressionLanguage $language, Expression|string $expression)
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->language = $language;
        $this->expression = $expression;
    }

<<<<<<< HEAD
    public function matches(Request $request)
    {
        if (!$this->language) {
=======
    public function matches(Request $request): bool
    {
        if (!isset($this->language)) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            throw new \LogicException('Unable to match the request as the expression language is not available.');
        }

        return $this->language->evaluate($this->expression, [
            'request' => $request,
            'method' => $request->getMethod(),
            'path' => rawurldecode($request->getPathInfo()),
            'host' => $request->getHost(),
            'ip' => $request->getClientIp(),
            'attributes' => $request->attributes->all(),
        ]) && parent::matches($request);
    }
}
