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

namespace Ramsey\Uuid\Provider\Time;

use Ramsey\Uuid\Provider\TimeProviderInterface;
use Ramsey\Uuid\Type\Integer as IntegerObject;
use Ramsey\Uuid\Type\Time;

/**
<<<<<<< HEAD
 * FixedTimeProvider uses an known time to provide the time
=======
 * FixedTimeProvider uses a known time to provide the time
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
 *
 * This provider allows the use of a previously-generated, or known, time
 * when generating time-based UUIDs.
 */
class FixedTimeProvider implements TimeProviderInterface
{
<<<<<<< HEAD
    /**
     * @var Time
     */
    private $fixedTime;

    public function __construct(Time $time)
    {
        $this->fixedTime = $time;
=======
    public function __construct(private Time $time)
    {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }

    /**
     * Sets the `usec` component of the time
     *
     * @param int|string|IntegerObject $value The `usec` value to set
     */
    public function setUsec($value): void
    {
<<<<<<< HEAD
        $this->fixedTime = new Time($this->fixedTime->getSeconds(), $value);
=======
        $this->time = new Time($this->time->getSeconds(), $value);
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }

    /**
     * Sets the `sec` component of the time
     *
     * @param int|string|IntegerObject $value The `sec` value to set
     */
    public function setSec($value): void
    {
<<<<<<< HEAD
        $this->fixedTime = new Time($value, $this->fixedTime->getMicroseconds());
=======
        $this->time = new Time($value, $this->time->getMicroseconds());
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }

    public function getTime(): Time
    {
<<<<<<< HEAD
        return $this->fixedTime;
=======
        return $this->time;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }
}
