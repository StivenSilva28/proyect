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

namespace Ramsey\Uuid\Rfc4122;

<<<<<<< HEAD
=======
use Ramsey\Uuid\Uuid;

>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
/**
 * Provides common functionality for handling the version, as defined by RFC 4122
 *
 * @psalm-immutable
 */
trait VersionTrait
{
    /**
     * Returns the version
     */
    abstract public function getVersion(): ?int;

    /**
<<<<<<< HEAD
=======
     * Returns true if these fields represent a max UUID
     */
    abstract public function isMax(): bool;

    /**
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * Returns true if these fields represent a nil UUID
     */
    abstract public function isNil(): bool;

    /**
     * Returns true if the version matches one of those defined by RFC 4122
     *
     * @return bool True if the UUID version is valid, false otherwise
     */
    private function isCorrectVersion(): bool
    {
<<<<<<< HEAD
        if ($this->isNil()) {
            return true;
        }

        switch ($this->getVersion()) {
            case 1:
            case 2:
            case 3:
            case 4:
            case 5:
            case 6:
                return true;
        }

        return false;
=======
        if ($this->isNil() || $this->isMax()) {
            return true;
        }

        return match ($this->getVersion()) {
            Uuid::UUID_TYPE_TIME, Uuid::UUID_TYPE_DCE_SECURITY,
            Uuid::UUID_TYPE_HASH_MD5, Uuid::UUID_TYPE_RANDOM,
            Uuid::UUID_TYPE_HASH_SHA1, Uuid::UUID_TYPE_REORDERED_TIME,
            Uuid::UUID_TYPE_UNIX_TIME, Uuid::UUID_TYPE_CUSTOM => true,
            default => false,
        };
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }
}
