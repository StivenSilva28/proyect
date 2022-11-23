<?php

namespace Illuminate\Database\Eloquent\Casts;

use ArrayObject as BaseArrayObject;
use Illuminate\Contracts\Support\Arrayable;
use JsonSerializable;

class ArrayObject extends BaseArrayObject implements Arrayable, JsonSerializable
{
    /**
     * Get a collection containing the underlying array.
     *
     * @return \Illuminate\Support\Collection
     */
    public function collect()
    {
        return collect($this->getArrayCopy());
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return $this->getArrayCopy();
    }

    /**
     * Get the array that should be JSON serialized.
     *
     * @return array
     */
<<<<<<< HEAD
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
=======
    public function jsonSerialize(): array
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->getArrayCopy();
    }
}
