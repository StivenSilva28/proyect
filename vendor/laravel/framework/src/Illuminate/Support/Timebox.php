<?php

namespace Illuminate\Support;

class Timebox
{
    /**
     * Indicates if the timebox is allowed to return early.
     *
     * @var bool
     */
    public $earlyReturn = false;

    /**
     * Invoke the given callback within the specified timebox minimum.
     *
     * @param  callable  $callback
     * @param  int  $microseconds
     * @return mixed
     */
    public function call(callable $callback, int $microseconds)
    {
        $start = microtime(true);

        $result = $callback($this);

<<<<<<< HEAD
        $remainder = $microseconds - ((microtime(true) - $start) * 1000000);
=======
        $remainder = intval($microseconds - ((microtime(true) - $start) * 1000000));
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

        if (! $this->earlyReturn && $remainder > 0) {
            $this->usleep($remainder);
        }

        return $result;
    }

    /**
     * Indicate that the timebox can return early.
     *
     * @return $this
     */
    public function returnEarly()
    {
        $this->earlyReturn = true;

        return $this;
    }

    /**
     * Indicate that the timebox cannot return early.
     *
     * @return $this
     */
    public function dontReturnEarly()
    {
        $this->earlyReturn = false;

        return $this;
    }

    /**
     * Sleep for the specified number of microseconds.
     *
<<<<<<< HEAD
     * @param  $microseconds
     * @return void
     */
    protected function usleep($microseconds)
=======
     * @param  int  $microseconds
     * @return void
     */
    protected function usleep(int $microseconds)
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        usleep($microseconds);
    }
}
