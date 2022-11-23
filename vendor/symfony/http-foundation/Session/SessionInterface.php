<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpFoundation\Session;

use Symfony\Component\HttpFoundation\Session\Storage\MetadataBag;

/**
 * Interface for the session.
 *
 * @author Drak <drak@zikula.org>
 */
interface SessionInterface
{
    /**
     * Starts the session storage.
     *
<<<<<<< HEAD
     * @return bool
     *
     * @throws \RuntimeException if session fails to start
     */
    public function start();

    /**
     * Returns the session ID.
     *
     * @return string
     */
    public function getId();
=======
     * @throws \RuntimeException if session fails to start
     */
    public function start(): bool;

    /**
     * Returns the session ID.
     */
    public function getId(): string;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * Sets the session ID.
     */
    public function setId(string $id);

    /**
     * Returns the session name.
<<<<<<< HEAD
     *
     * @return string
     */
    public function getName();
=======
     */
    public function getName(): string;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * Sets the session name.
     */
    public function setName(string $name);

    /**
     * Invalidates the current session.
     *
     * Clears all session attributes and flashes and regenerates the
     * session and deletes the old session from persistence.
     *
     * @param int $lifetime Sets the cookie lifetime for the session cookie. A null value
     *                      will leave the system settings unchanged, 0 sets the cookie
     *                      to expire with browser session. Time is in seconds, and is
     *                      not a Unix timestamp.
<<<<<<< HEAD
     *
     * @return bool
     */
    public function invalidate(int $lifetime = null);
=======
     */
    public function invalidate(int $lifetime = null): bool;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * Migrates the current session to a new session id while maintaining all
     * session attributes.
     *
     * @param bool $destroy  Whether to delete the old session or leave it to garbage collection
     * @param int  $lifetime Sets the cookie lifetime for the session cookie. A null value
     *                       will leave the system settings unchanged, 0 sets the cookie
     *                       to expire with browser session. Time is in seconds, and is
     *                       not a Unix timestamp.
<<<<<<< HEAD
     *
     * @return bool
     */
    public function migrate(bool $destroy = false, int $lifetime = null);
=======
     */
    public function migrate(bool $destroy = false, int $lifetime = null): bool;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * Force the session to be saved and closed.
     *
     * This method is generally not required for real sessions as
     * the session will be automatically saved at the end of
     * code execution.
     */
    public function save();

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

    /**
     * Returns attributes.
     *
     * @return array
     */
    public function all();
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

    /**
     * Returns attributes.
     */
    public function all(): array;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * Sets attributes.
     */
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

    /**
     * Clears all attributes.
     */
    public function clear();

    /**
     * Checks if the session was started.
<<<<<<< HEAD
     *
     * @return bool
     */
    public function isStarted();
=======
     */
    public function isStarted(): bool;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * Registers a SessionBagInterface with the session.
     */
    public function registerBag(SessionBagInterface $bag);

    /**
     * Gets a bag instance by name.
<<<<<<< HEAD
     *
     * @return SessionBagInterface
     */
    public function getBag(string $name);

    /**
     * Gets session meta.
     *
     * @return MetadataBag
     */
    public function getMetadataBag();
=======
     */
    public function getBag(string $name): SessionBagInterface;

    /**
     * Gets session meta.
     */
    public function getMetadataBag(): MetadataBag;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
}
