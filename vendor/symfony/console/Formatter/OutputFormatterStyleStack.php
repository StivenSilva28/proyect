<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Console\Formatter;

use Symfony\Component\Console\Exception\InvalidArgumentException;
use Symfony\Contracts\Service\ResetInterface;

/**
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class OutputFormatterStyleStack implements ResetInterface
{
    /**
     * @var OutputFormatterStyleInterface[]
     */
<<<<<<< HEAD
    private $styles;

    private $emptyStyle;
=======
    private array $styles = [];

    private OutputFormatterStyleInterface $emptyStyle;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    public function __construct(OutputFormatterStyleInterface $emptyStyle = null)
    {
        $this->emptyStyle = $emptyStyle ?? new OutputFormatterStyle();
        $this->reset();
    }

    /**
     * Resets stack (ie. empty internal arrays).
     */
    public function reset()
    {
        $this->styles = [];
    }

    /**
     * Pushes a style in the stack.
     */
    public function push(OutputFormatterStyleInterface $style)
    {
        $this->styles[] = $style;
    }

    /**
     * Pops a style from the stack.
     *
<<<<<<< HEAD
     * @return OutputFormatterStyleInterface
     *
     * @throws InvalidArgumentException When style tags incorrectly nested
     */
    public function pop(OutputFormatterStyleInterface $style = null)
=======
     * @throws InvalidArgumentException When style tags incorrectly nested
     */
    public function pop(OutputFormatterStyleInterface $style = null): OutputFormatterStyleInterface
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        if (empty($this->styles)) {
            return $this->emptyStyle;
        }

        if (null === $style) {
            return array_pop($this->styles);
        }

        foreach (array_reverse($this->styles, true) as $index => $stackedStyle) {
            if ($style->apply('') === $stackedStyle->apply('')) {
                $this->styles = \array_slice($this->styles, 0, $index);

                return $stackedStyle;
            }
        }

        throw new InvalidArgumentException('Incorrectly nested style tag found.');
    }

    /**
     * Computes current style with stacks top codes.
<<<<<<< HEAD
     *
     * @return OutputFormatterStyle
     */
    public function getCurrent()
=======
     */
    public function getCurrent(): OutputFormatterStyleInterface
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        if (empty($this->styles)) {
            return $this->emptyStyle;
        }

        return $this->styles[\count($this->styles) - 1];
    }

    /**
     * @return $this
     */
<<<<<<< HEAD
    public function setEmptyStyle(OutputFormatterStyleInterface $emptyStyle)
=======
    public function setEmptyStyle(OutputFormatterStyleInterface $emptyStyle): static
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->emptyStyle = $emptyStyle;

        return $this;
    }

<<<<<<< HEAD
    /**
     * @return OutputFormatterStyleInterface
     */
    public function getEmptyStyle()
=======
    public function getEmptyStyle(): OutputFormatterStyleInterface
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->emptyStyle;
    }
}
