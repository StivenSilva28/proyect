<?php

namespace Illuminate\Http\Resources;

use Exception;
use Illuminate\Support\Traits\ForwardsCalls;
<<<<<<< HEAD

trait DelegatesToResource
{
    use ForwardsCalls;
=======
use Illuminate\Support\Traits\Macroable;

trait DelegatesToResource
{
    use ForwardsCalls, Macroable {
        __call as macroCall;
    }
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * Get the value of the resource's route key.
     *
     * @return mixed
     */
    public function getRouteKey()
    {
        return $this->resource->getRouteKey();
    }

    /**
     * Get the route key for the resource.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return $this->resource->getRouteKeyName();
    }

    /**
     * Retrieve the model for a bound value.
     *
     * @param  mixed  $value
     * @param  string|null  $field
     * @return void
     *
     * @throws \Exception
     */
    public function resolveRouteBinding($value, $field = null)
    {
        throw new Exception('Resources may not be implicitly resolved from route bindings.');
    }

    /**
     * Retrieve the model for a bound value.
     *
     * @param  string  $childType
     * @param  mixed  $value
     * @param  string|null  $field
     * @return void
     *
     * @throws \Exception
     */
    public function resolveChildRouteBinding($childType, $value, $field = null)
    {
        throw new Exception('Resources may not be implicitly resolved from route bindings.');
    }

    /**
     * Determine if the given attribute exists.
     *
     * @param  mixed  $offset
     * @return bool
     */
<<<<<<< HEAD
    #[\ReturnTypeWillChange]
    public function offsetExists($offset)
=======
    public function offsetExists($offset): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return isset($this->resource[$offset]);
    }

    /**
     * Get the value for a given offset.
     *
     * @param  mixed  $offset
     * @return mixed
     */
<<<<<<< HEAD
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
=======
    public function offsetGet($offset): mixed
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->resource[$offset];
    }

    /**
     * Set the value for a given offset.
     *
     * @param  mixed  $offset
     * @param  mixed  $value
     * @return void
     */
<<<<<<< HEAD
    #[\ReturnTypeWillChange]
    public function offsetSet($offset, $value)
=======
    public function offsetSet($offset, $value): void
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->resource[$offset] = $value;
    }

    /**
     * Unset the value for a given offset.
     *
     * @param  mixed  $offset
     * @return void
     */
<<<<<<< HEAD
    #[\ReturnTypeWillChange]
    public function offsetUnset($offset)
=======
    public function offsetUnset($offset): void
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        unset($this->resource[$offset]);
    }

    /**
     * Determine if an attribute exists on the resource.
     *
     * @param  string  $key
     * @return bool
     */
    public function __isset($key)
    {
        return isset($this->resource->{$key});
    }

    /**
     * Unset an attribute on the resource.
     *
     * @param  string  $key
     * @return void
     */
    public function __unset($key)
    {
        unset($this->resource->{$key});
    }

    /**
     * Dynamically get properties from the underlying resource.
     *
     * @param  string  $key
     * @return mixed
     */
    public function __get($key)
    {
        return $this->resource->{$key};
    }

    /**
     * Dynamically pass method calls to the underlying resource.
     *
     * @param  string  $method
     * @param  array  $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
<<<<<<< HEAD
=======
        if (static::hasMacro($method)) {
            return $this->macroCall($method, $parameters);
        }

>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
        return $this->forwardCallTo($this->resource, $method, $parameters);
    }
}
