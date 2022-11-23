<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\VarDumper\Cloner;

/**
 * DumperInterface used by Data objects.
 *
 * @author Nicolas Grekas <p@tchwork.com>
 */
interface DumperInterface
{
    /**
     * Dumps a scalar value.
<<<<<<< HEAD
     *
     * @param string                $type  The PHP type of the value being dumped
     * @param string|int|float|bool $value The scalar value being dumped
     */
    public function dumpScalar(Cursor $cursor, string $type, $value);
=======
     */
    public function dumpScalar(Cursor $cursor, string $type, string|int|float|bool|null $value);
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * Dumps a string.
     *
     * @param string $str The string being dumped
     * @param bool   $bin Whether $str is UTF-8 or binary encoded
     * @param int    $cut The number of characters $str has been cut by
     */
    public function dumpString(Cursor $cursor, string $str, bool $bin, int $cut);

    /**
     * Dumps while entering an hash.
     *
<<<<<<< HEAD
     * @param int        $type     A Cursor::HASH_* const for the type of hash
     * @param string|int $class    The object class, resource type or array count
     * @param bool       $hasChild When the dump of the hash has child item
     */
    public function enterHash(Cursor $cursor, int $type, $class, bool $hasChild);
=======
     * @param int             $type     A Cursor::HASH_* const for the type of hash
     * @param string|int|null $class    The object class, resource type or array count
     * @param bool            $hasChild When the dump of the hash has child item
     */
    public function enterHash(Cursor $cursor, int $type, string|int|null $class, bool $hasChild);
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * Dumps while leaving an hash.
     *
<<<<<<< HEAD
     * @param int        $type     A Cursor::HASH_* const for the type of hash
     * @param string|int $class    The object class, resource type or array count
     * @param bool       $hasChild When the dump of the hash has child item
     * @param int        $cut      The number of items the hash has been cut by
     */
    public function leaveHash(Cursor $cursor, int $type, $class, bool $hasChild, int $cut);
=======
     * @param int             $type     A Cursor::HASH_* const for the type of hash
     * @param string|int|null $class    The object class, resource type or array count
     * @param bool            $hasChild When the dump of the hash has child item
     * @param int             $cut      The number of items the hash has been cut by
     */
    public function leaveHash(Cursor $cursor, int $type, string|int|null $class, bool $hasChild, int $cut);
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
}
