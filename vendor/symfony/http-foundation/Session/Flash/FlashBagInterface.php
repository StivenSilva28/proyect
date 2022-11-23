<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpFoundation\Session\Flash;

use Symfony\Component\HttpFoundation\Session\SessionBagInterface;

/**
 * FlashBagInterface.
 *
 * @author Drak <drak@zikula.org>
 */
interface FlashBagInterface extends SessionBagInterface
{
    /**
     * Adds a flash message for the given type.
<<<<<<< HEAD
     *
     * @param mixed $message
     */
    public function add(string $type, $message);

    /**
     * Registers one or more messages for a given type.
     *
     * @param string|array $messages
     */
    public function set(string $type, $messages);
=======
     */
    public function add(string $type, mixed $message);

    /**
     * Registers one or more messages for a given type.
     */
    public function set(string $type, string|array $messages);
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * Gets flash messages for a given type.
     *
     * @param string $type    Message category type
     * @param array  $default Default value if $type does not exist
<<<<<<< HEAD
     *
     * @return array
     */
    public function peek(string $type, array $default = []);

    /**
     * Gets all flash messages.
     *
     * @return array
     */
    public function peekAll();
=======
     */
    public function peek(string $type, array $default = []): array;

    /**
     * Gets all flash messages.
     */
    public function peekAll(): array;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * Gets and clears flash from the stack.
     *
     * @param array $default Default value if $type does not exist
<<<<<<< HEAD
     *
     * @return array
     */
    public function get(string $type, array $default = []);

    /**
     * Gets and clears flashes from the stack.
     *
     * @return array
     */
    public function all();
=======
     */
    public function get(string $type, array $default = []): array;

    /**
     * Gets and clears flashes from the stack.
     */
    public function all(): array;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * Sets all flash messages.
     */
    public function setAll(array $messages);

    /**
     * Has flash messages for a given type?
<<<<<<< HEAD
     *
     * @return bool
     */
    public function has(string $type);

    /**
     * Returns a list of all defined types.
     *
     * @return array
     */
    public function keys();
=======
     */
    public function has(string $type): bool;

    /**
     * Returns a list of all defined types.
     */
    public function keys(): array;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
}
