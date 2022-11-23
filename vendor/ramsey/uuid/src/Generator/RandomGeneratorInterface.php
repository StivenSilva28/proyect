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

namespace Ramsey\Uuid\Generator;

/**
 * A random generator generates strings of random binary data
 */
interface RandomGeneratorInterface
{
    /**
     * Generates a string of randomized binary data
     *
<<<<<<< HEAD
     * @param int $length The number of bytes of random binary data to generate
=======
     * @param int<1, max> $length The number of bytes of random binary data to generate
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     *
     * @return string A binary string
     */
    public function generate(int $length): string;
}
