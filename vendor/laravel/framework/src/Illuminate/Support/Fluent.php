<?php

namespace Illuminate\Support;

use ArrayAccess;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use JsonSerializable;

<<<<<<< HEAD
=======
/**
 * @template TKey of array-key
 * @template TValue
 *
 * @implements \Illuminate\Contracts\Support\Arrayable<TKey, TValue>
 * @implements \ArrayAccess<TKey, TValue>
 */
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
class Fluent implements Arrayable, ArrayAccess, Jsonable, JsonSerializable
{
    /**
     * All of the attributes set on the fluent instance.
     *
<<<<<<< HEAD
     * @var array
=======
     * @var array<TKey, TValue>
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    protected $attributes = [];

    /**
     * Create a new fluent instance.
     *
<<<<<<< HEAD
     * @param  array|object  $attributes
=======
     * @param  iterable<TKey, TValue>  $attributes
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * @return void
     */
    public function __construct($attributes = [])
    {
        foreach ($attributes as $key => $value) {
            $this->attributes[$key] = $value;
        }
    }

    /**
     * Get an attribute from the fluent instance.
     *
<<<<<<< HEAD
     * @param  string  $key
     * @param  mixed  $default
     * @return mixed
=======
     * @template TGetDefault
     *
     * @param  TKey  $key
     * @param  TGetDefault|(\Closure(): TGetDefault)  $default
     * @return TValue|TGetDefault
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    public function get($key, $default = null)
    {
        if (array_key_exists($key, $this->attributes)) {
            return $this->attributes[$key];
        }

        return value($default);
    }

    /**
     * Get the attributes from the fluent instance.
     *
<<<<<<< HEAD
     * @return array
=======
     * @return array<TKey, TValue>
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * Convert the fluent instance to an array.
     *
<<<<<<< HEAD
     * @return array
=======
     * @return array<TKey, TValue>
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    public function toArray()
    {
        return $this->attributes;
    }

    /**
     * Convert the object into something JSON serializable.
     *
<<<<<<< HEAD
     * @return array
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
=======
     * @return array<TKey, TValue>
     */
    public function jsonSerialize(): array
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->toArray();
    }

    /**
     * Convert the fluent instance to JSON.
     *
     * @param  int  $options
     * @return string
     */
    public function toJson($options = 0)
    {
        return json_encode($this->jsonSerialize(), $options);
    }

    /**
     * Determine if the given offset exists.
     *
<<<<<<< HEAD
     * @param  string  $offset
     * @return bool
     */
    #[\ReturnTypeWillChange]
    public function offsetExists($offset)
=======
     * @param  TKey  $offset
     * @return bool
     */
    public function offsetExists($offset): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return isset($this->attributes[$offset]);
    }

    /**
     * Get the value for a given offset.
     *
<<<<<<< HEAD
     * @param  string  $offset
     * @return mixed
     */
    #[\ReturnTypeWillChange]
    public function offsetGet($offset)
=======
     * @param  TKey  $offset
     * @return TValue|null
     */
    public function offsetGet($offset): mixed
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->get($offset);
    }

    /**
     * Set the value at the given offset.
     *
<<<<<<< HEAD
     * @param  string  $offset
     * @param  mixed  $value
     * @return void
     */
    #[\ReturnTypeWillChange]
    public function offsetSet($offset, $value)
=======
     * @param  TKey  $offset
     * @param  TValue  $value
     * @return void
     */
    public function offsetSet($offset, $value): void
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $this->attributes[$offset] = $value;
    }

    /**
     * Unset the value at the given offset.
     *
<<<<<<< HEAD
     * @param  string  $offset
     * @return void
     */
    #[\ReturnTypeWillChange]
    public function offsetUnset($offset)
=======
     * @param  TKey  $offset
     * @return void
     */
    public function offsetUnset($offset): void
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        unset($this->attributes[$offset]);
    }

    /**
     * Handle dynamic calls to the fluent instance to set attributes.
     *
<<<<<<< HEAD
     * @param  string  $method
     * @param  array  $parameters
=======
     * @param  TKey  $method
     * @param  array{0: ?TValue}  $parameters
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * @return $this
     */
    public function __call($method, $parameters)
    {
<<<<<<< HEAD
        $this->attributes[$method] = count($parameters) > 0 ? $parameters[0] : true;
=======
        $this->attributes[$method] = count($parameters) > 0 ? reset($parameters) : true;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

        return $this;
    }

    /**
     * Dynamically retrieve the value of an attribute.
     *
<<<<<<< HEAD
     * @param  string  $key
     * @return mixed
=======
     * @param  TKey  $key
     * @return TValue|null
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    public function __get($key)
    {
        return $this->get($key);
    }

    /**
     * Dynamically set the value of an attribute.
     *
<<<<<<< HEAD
     * @param  string  $key
     * @param  mixed  $value
=======
     * @param  TKey  $key
     * @param  TValue  $value
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * @return void
     */
    public function __set($key, $value)
    {
        $this->offsetSet($key, $value);
    }

    /**
     * Dynamically check if an attribute is set.
     *
<<<<<<< HEAD
     * @param  string  $key
=======
     * @param  TKey  $key
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * @return bool
     */
    public function __isset($key)
    {
        return $this->offsetExists($key);
    }

    /**
     * Dynamically unset an attribute.
     *
<<<<<<< HEAD
     * @param  string  $key
=======
     * @param  TKey  $key
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * @return void
     */
    public function __unset($key)
    {
        $this->offsetUnset($key);
    }
}
