<?php

namespace Illuminate\Contracts\Support;

<<<<<<< HEAD
=======
/**
 * @template TKey of array-key
 * @template TValue
 */
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
interface Arrayable
{
    /**
     * Get the instance as an array.
     *
<<<<<<< HEAD
     * @return array
=======
     * @return array<TKey, TValue>
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    public function toArray();
}
