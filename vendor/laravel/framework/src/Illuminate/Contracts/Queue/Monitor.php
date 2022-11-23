<?php

namespace Illuminate\Contracts\Queue;

interface Monitor
{
    /**
     * Register a callback to be executed on every iteration through the queue loop.
     *
     * @param  mixed  $callback
     * @return void
     */
    public function looping($callback);

    /**
<<<<<<< HEAD
     * Register a callback to be executed when a job fails after the maximum amount of retries.
=======
     * Register a callback to be executed when a job fails after the maximum number of retries.
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     *
     * @param  mixed  $callback
     * @return void
     */
    public function failing($callback);

    /**
     * Register a callback to be executed when a daemon queue is stopping.
     *
     * @param  mixed  $callback
     * @return void
     */
    public function stopping($callback);
}
