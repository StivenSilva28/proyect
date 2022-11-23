<?php

namespace Illuminate\Foundation\Testing\Concerns;

<<<<<<< HEAD
use DateTimeInterface;
=======
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
use Illuminate\Foundation\Testing\Wormhole;
use Illuminate\Support\Carbon;

trait InteractsWithTime
{
    /**
<<<<<<< HEAD
=======
     * Freeze time.
     *
     * @param  callable|null  $callback
     * @return mixed
     */
    public function freezeTime($callback = null)
    {
        return $this->travelTo(Carbon::now(), $callback);
    }

    /**
     * Freeze time at the beginning of the current second.
     *
     * @param  callable|null  $callback
     * @return mixed
     */
    public function freezeSecond($callback = null)
    {
        return $this->travelTo(Carbon::now()->startOfSecond(), $callback);
    }

    /**
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * Begin travelling to another time.
     *
     * @param  int  $value
     * @return \Illuminate\Foundation\Testing\Wormhole
     */
    public function travel($value)
    {
        return new Wormhole($value);
    }

    /**
     * Travel to another time.
     *
<<<<<<< HEAD
     * @param  \DateTimeInterface  $date
     * @param  callable|null  $callback
     * @return mixed
     */
    public function travelTo(DateTimeInterface $date, $callback = null)
=======
     * @param  \DateTimeInterface|\Closure|\Illuminate\Support\Carbon|string|bool|null  $date
     * @param  callable|null  $callback
     * @return mixed
     */
    public function travelTo($date, $callback = null)
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        Carbon::setTestNow($date);

        if ($callback) {
<<<<<<< HEAD
            return tap($callback(), function () {
=======
            return tap($callback($date), function () {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
                Carbon::setTestNow();
            });
        }
    }

    /**
     * Travel back to the current time.
     *
     * @return \DateTimeInterface
     */
    public function travelBack()
    {
        return Wormhole::back();
    }
}
