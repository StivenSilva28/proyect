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

/**
 * StreamedResponse represents a streamed HTTP response.
 *
 * A StreamedResponse uses a callback for its content.
 *
 * The callback should use the standard PHP functions like echo
 * to stream the response back to the client. The flush() function
 * can also be used if needed.
 *
 * @see flush()
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class StreamedResponse extends Response
{
    protected $callback;
    protected $streamed;
<<<<<<< HEAD
    private $headersSent;
=======
    private bool $headersSent;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    public function __construct(callable $callback = null, int $status = 200, array $headers = [])
    {
        parent::__construct(null, $status, $headers);

        if (null !== $callback) {
            $this->setCallback($callback);
        }
        $this->streamed = false;
        $this->headersSent = false;
    }

    /**
<<<<<<< HEAD
     * Factory method for chainability.
     *
     * @param callable|null $callback A valid PHP callback or null to set it later
     *
     * @return static
     *
     * @deprecated since Symfony 5.1, use __construct() instead.
     */
    public static function create($callback = null, int $status = 200, array $headers = [])
    {
        trigger_deprecation('symfony/http-foundation', '5.1', 'The "%s()" method is deprecated, use "new %s()" instead.', __METHOD__, static::class);

        return new static($callback, $status, $headers);
    }

    /**
=======
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * Sets the PHP callback associated with this Response.
     *
     * @return $this
     */
<<<<<<< HEAD
    public function setCallback(callable $callback)
=======
    public function setCallback(callable $callback): static
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->callback = $callback;

        return $this;
    }

    /**
     * {@inheritdoc}
     *
     * This method only sends the headers once.
     *
     * @return $this
     */
<<<<<<< HEAD
    public function sendHeaders()
=======
    public function sendHeaders(): static
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        if ($this->headersSent) {
            return $this;
        }

        $this->headersSent = true;

        return parent::sendHeaders();
    }

    /**
     * {@inheritdoc}
     *
     * This method only sends the content once.
     *
     * @return $this
     */
<<<<<<< HEAD
    public function sendContent()
=======
    public function sendContent(): static
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        if ($this->streamed) {
            return $this;
        }

        $this->streamed = true;

        if (null === $this->callback) {
            throw new \LogicException('The Response callback must not be null.');
        }

        ($this->callback)();

        return $this;
    }

    /**
     * {@inheritdoc}
     *
     * @throws \LogicException when the content is not null
     *
     * @return $this
     */
<<<<<<< HEAD
    public function setContent(?string $content)
=======
    public function setContent(?string $content): static
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        if (null !== $content) {
            throw new \LogicException('The content cannot be set on a StreamedResponse instance.');
        }

        $this->streamed = true;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function getContent()
=======
    public function getContent(): string|false
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return false;
    }
}
