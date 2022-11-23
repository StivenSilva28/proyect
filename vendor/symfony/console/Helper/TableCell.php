<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Console\Helper;

use Symfony\Component\Console\Exception\InvalidArgumentException;

/**
 * @author Abdellatif Ait boudad <a.aitboudad@gmail.com>
 */
class TableCell
{
<<<<<<< HEAD
    private $value;
    private $options = [
=======
    private string $value;
    private array $options = [
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
        'rowspan' => 1,
        'colspan' => 1,
        'style' => null,
    ];

    public function __construct(string $value = '', array $options = [])
    {
        $this->value = $value;

        // check option names
        if ($diff = array_diff(array_keys($options), array_keys($this->options))) {
            throw new InvalidArgumentException(sprintf('The TableCell does not support the following options: \'%s\'.', implode('\', \'', $diff)));
        }

        if (isset($options['style']) && !$options['style'] instanceof TableCellStyle) {
            throw new InvalidArgumentException('The style option must be an instance of "TableCellStyle".');
        }

        $this->options = array_merge($this->options, $options);
    }

    /**
     * Returns the cell value.
<<<<<<< HEAD
     *
     * @return string
     */
    public function __toString()
=======
     */
    public function __toString(): string
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->value;
    }

    /**
     * Gets number of colspan.
<<<<<<< HEAD
     *
     * @return int
     */
    public function getColspan()
=======
     */
    public function getColspan(): int
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return (int) $this->options['colspan'];
    }

    /**
     * Gets number of rowspan.
<<<<<<< HEAD
     *
     * @return int
     */
    public function getRowspan()
=======
     */
    public function getRowspan(): int
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return (int) $this->options['rowspan'];
    }

    public function getStyle(): ?TableCellStyle
    {
        return $this->options['style'];
    }
}
