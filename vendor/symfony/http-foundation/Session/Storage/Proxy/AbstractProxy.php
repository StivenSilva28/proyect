<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpFoundation\Session\Storage\Proxy;

/**
 * @author Drak <drak@zikula.org>
 */
abstract class AbstractProxy
{
    /**
     * Flag if handler wraps an internal PHP session handler (using \SessionHandler).
     *
     * @var bool
     */
    protected $wrapper = false;

    /**
     * @var string
     */
    protected $saveHandlerName;

    /**
     * Gets the session.save_handler name.
<<<<<<< HEAD
     *
     * @return string|null
     */
    public function getSaveHandlerName()
=======
     */
    public function getSaveHandlerName(): ?string
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->saveHandlerName;
    }

    /**
     * Is this proxy handler and instance of \SessionHandlerInterface.
<<<<<<< HEAD
     *
     * @return bool
     */
    public function isSessionHandlerInterface()
=======
     */
    public function isSessionHandlerInterface(): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this instanceof \SessionHandlerInterface;
    }

    /**
     * Returns true if this handler wraps an internal PHP session save handler using \SessionHandler.
<<<<<<< HEAD
     *
     * @return bool
     */
    public function isWrapper()
=======
     */
    public function isWrapper(): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->wrapper;
    }

    /**
     * Has a session started?
<<<<<<< HEAD
     *
     * @return bool
     */
    public function isActive()
=======
     */
    public function isActive(): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return \PHP_SESSION_ACTIVE === session_status();
    }

    /**
     * Gets the session ID.
<<<<<<< HEAD
     *
     * @return string
     */
    public function getId()
=======
     */
    public function getId(): string
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return session_id();
    }

    /**
     * Sets the session ID.
     *
     * @throws \LogicException
     */
    public function setId(string $id)
    {
        if ($this->isActive()) {
            throw new \LogicException('Cannot change the ID of an active session.');
        }

        session_id($id);
    }

    /**
     * Gets the session name.
<<<<<<< HEAD
     *
     * @return string
     */
    public function getName()
=======
     */
    public function getName(): string
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return session_name();
    }

    /**
     * Sets the session name.
     *
     * @throws \LogicException
     */
    public function setName(string $name)
    {
        if ($this->isActive()) {
            throw new \LogicException('Cannot change the name of an active session.');
        }

        session_name($name);
    }
}
