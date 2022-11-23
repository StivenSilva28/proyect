<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpFoundation\Session\Attribute;

use Symfony\Component\HttpFoundation\Session\SessionBagInterface;

/**
 * Attributes store.
 *
 * @author Drak <drak@zikula.org>
 */
interface AttributeBagInterface extends SessionBagInterface
{
    /**
     * Checks if an attribute is defined.
<<<<<<< HEAD
     *
     * @return bool
     */
    public function has(string $name);

    /**
     * Returns an attribute.
     *
     * @param mixed $default The default value if not found
     *
     * @return mixed
     */
    public function get(string $name, $default = null);

    /**
     * Sets an attribute.
     *
     * @param mixed $value
     */
    public function set(string $name, $value);
=======
     */
    public function has(string $name): bool;

    /**
     * Returns an attribute.
     */
    public function get(string $name, mixed $default = null): mixed;

    /**
     * Sets an attribute.
     */
    public function set(string $name, mixed $value);
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * Returns attributes.
     *
     * @return array<string, mixed>
     */
<<<<<<< HEAD
    public function all();
=======
    public function all(): array;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    public function replace(array $attributes);

    /**
     * Removes an attribute.
     *
     * @return mixed The removed value or null when it does not exist
     */
<<<<<<< HEAD
    public function remove(string $name);
=======
    public function remove(string $name): mixed;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
}
