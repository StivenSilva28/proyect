<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Mime\Header;

/**
 * A Simple MIME Header.
 *
 * @author Chris Corbyn
 */
class UnstructuredHeader extends AbstractHeader
{
<<<<<<< HEAD
    private $value;
=======
    private string $value;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    public function __construct(string $name, string $value)
    {
        parent::__construct($name);

        $this->setValue($value);
    }

    /**
     * @param string $body
     */
<<<<<<< HEAD
    public function setBody($body)
=======
    public function setBody(mixed $body)
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->setValue($body);
    }

<<<<<<< HEAD
    /**
     * @return string
     */
    public function getBody()
=======
    public function getBody(): string
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->getValue();
    }

    /**
     * Get the (unencoded) value of this header.
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * Set the (unencoded) value of this header.
     */
    public function setValue(string $value)
    {
        $this->value = $value;
    }

    /**
     * Get the value of this header prepared for rendering.
     */
    public function getBodyAsString(): string
    {
        return $this->encodeWords($this, $this->value);
    }
}
