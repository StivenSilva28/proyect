<?php

/**
 * This file is part of the ramsey/uuid library
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @copyright Copyright (c) Ben Ramsey <ben@benramsey.com>
 * @license http://opensource.org/licenses/MIT MIT
 */

declare(strict_types=1);

namespace Ramsey\Uuid\Fields;

use ValueError;

use function base64_decode;
use function sprintf;
use function strlen;

/**
 * Provides common serialization functionality to fields
 *
 * @psalm-immutable
 */
trait SerializableFieldsTrait
{
    /**
     * @param string $bytes The bytes that comprise the fields
     */
    abstract public function __construct(string $bytes);

    /**
     * Returns the bytes that comprise the fields
     */
    abstract public function getBytes(): string;

    /**
     * Returns a string representation of object
     */
    public function serialize(): string
    {
        return $this->getBytes();
    }

    /**
     * @return array{bytes: string}
     */
    public function __serialize(): array
    {
        return ['bytes' => $this->getBytes()];
    }

    /**
     * Constructs the object from a serialized string representation
     *
<<<<<<< HEAD
     * @param string $serialized The serialized string representation of the object
     *
     * @phpcsSuppress SlevomatCodingStandard.TypeHints.ParameterTypeHint.MissingNativeTypeHint
     * @psalm-suppress UnusedMethodCall
     */
    public function unserialize($serialized): void
    {
        if (strlen($serialized) === 16) {
            $this->__construct($serialized);
        } else {
            $this->__construct(base64_decode($serialized));
=======
     * @param string $data The serialized string representation of the object
     *
     * @psalm-suppress UnusedMethodCall
     */
    public function unserialize(string $data): void
    {
        if (strlen($data) === 16) {
            $this->__construct($data);
        } else {
            $this->__construct(base64_decode($data));
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
        }
    }

    /**
<<<<<<< HEAD
     * @param array{bytes: string} $data
=======
     * @param array{bytes?: string} $data
     *
     * @psalm-suppress UnusedMethodCall
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    public function __unserialize(array $data): void
    {
        // @codeCoverageIgnoreStart
        if (!isset($data['bytes'])) {
            throw new ValueError(sprintf('%s(): Argument #1 ($data) is invalid', __METHOD__));
        }
        // @codeCoverageIgnoreEnd

        $this->unserialize($data['bytes']);
    }
}
