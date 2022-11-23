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

/**
 * Formatter interface for console output.
 *
 * @author Konstantin Kudryashov <ever.zet@gmail.com>
 */
interface OutputFormatterInterface
{
    /**
     * Sets the decorated flag.
     */
    public function setDecorated(bool $decorated);

    /**
     * Whether the output will decorate messages.
<<<<<<< HEAD
     *
     * @return bool
     */
    public function isDecorated();
=======
     */
    public function isDecorated(): bool;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * Sets a new style.
     */
    public function setStyle(string $name, OutputFormatterStyleInterface $style);

    /**
     * Checks if output formatter has style with specified name.
<<<<<<< HEAD
     *
     * @return bool
     */
    public function hasStyle(string $name);
=======
     */
    public function hasStyle(string $name): bool;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * Gets style options from style with specified name.
     *
<<<<<<< HEAD
     * @return OutputFormatterStyleInterface
     *
     * @throws \InvalidArgumentException When style isn't defined
     */
    public function getStyle(string $name);

    /**
     * Formats a message according to the given styles.
     *
     * @return string|null
     */
    public function format(?string $message);
=======
     * @throws \InvalidArgumentException When style isn't defined
     */
    public function getStyle(string $name): OutputFormatterStyleInterface;

    /**
     * Formats a message according to the given styles.
     */
    public function format(?string $message): ?string;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
}
