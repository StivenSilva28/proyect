<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Contracts\Translation;

interface LocaleAwareInterface
{
    /**
     * Sets the current locale.
     *
<<<<<<< HEAD
     * @param string $locale The locale
     *
=======
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * @throws \InvalidArgumentException If the locale contains invalid characters
     */
    public function setLocale(string $locale);

    /**
     * Returns the current locale.
<<<<<<< HEAD
     *
     * @return string
     */
    public function getLocale();
=======
     */
    public function getLocale(): string;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
}
