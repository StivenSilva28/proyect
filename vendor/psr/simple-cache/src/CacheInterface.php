<?php

namespace Psr\SimpleCache;

interface CacheInterface
{
    /**
     * Fetches a value from the cache.
     *
     * @param string $key     The unique key of this item in the cache.
     * @param mixed  $default Default value to return if the key does not exist.
     *
     * @return mixed The value of the item from the cache, or $default in case of cache miss.
     *
     * @throws \Psr\SimpleCache\InvalidArgumentException
     *   MUST be thrown if the $key string is not a legal value.
     */
<<<<<<< HEAD
    public function get($key, $default = null);
=======
    public function get(string $key, mixed $default = null): mixed;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * Persists data in the cache, uniquely referenced by a key with an optional expiration TTL time.
     *
     * @param string                 $key   The key of the item to store.
     * @param mixed                  $value The value of the item to store, must be serializable.
     * @param null|int|\DateInterval $ttl   Optional. The TTL value of this item. If no value is sent and
     *                                      the driver supports TTL then the library may set a default value
     *                                      for it or let the driver take care of that.
     *
     * @return bool True on success and false on failure.
     *
     * @throws \Psr\SimpleCache\InvalidArgumentException
     *   MUST be thrown if the $key string is not a legal value.
     */
<<<<<<< HEAD
    public function set($key, $value, $ttl = null);
=======
    public function set(string $key, mixed $value, null|int|\DateInterval $ttl = null): bool;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * Delete an item from the cache by its unique key.
     *
     * @param string $key The unique cache key of the item to delete.
     *
     * @return bool True if the item was successfully removed. False if there was an error.
     *
     * @throws \Psr\SimpleCache\InvalidArgumentException
     *   MUST be thrown if the $key string is not a legal value.
     */
<<<<<<< HEAD
    public function delete($key);
=======
    public function delete(string $key): bool;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * Wipes clean the entire cache's keys.
     *
     * @return bool True on success and false on failure.
     */
<<<<<<< HEAD
    public function clear();
=======
    public function clear(): bool;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * Obtains multiple cache items by their unique keys.
     *
<<<<<<< HEAD
     * @param iterable $keys    A list of keys that can obtained in a single operation.
     * @param mixed    $default Default value to return for keys that do not exist.
     *
     * @return iterable A list of key => value pairs. Cache keys that do not exist or are stale will have $default as value.
=======
     * @param iterable<string> $keys    A list of keys that can be obtained in a single operation.
     * @param mixed            $default Default value to return for keys that do not exist.
     *
     * @return iterable<string, mixed> A list of key => value pairs. Cache keys that do not exist or are stale will have $default as value.
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     *
     * @throws \Psr\SimpleCache\InvalidArgumentException
     *   MUST be thrown if $keys is neither an array nor a Traversable,
     *   or if any of the $keys are not a legal value.
     */
<<<<<<< HEAD
    public function getMultiple($keys, $default = null);
=======
    public function getMultiple(iterable $keys, mixed $default = null): iterable;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * Persists a set of key => value pairs in the cache, with an optional TTL.
     *
     * @param iterable               $values A list of key => value pairs for a multiple-set operation.
     * @param null|int|\DateInterval $ttl    Optional. The TTL value of this item. If no value is sent and
     *                                       the driver supports TTL then the library may set a default value
     *                                       for it or let the driver take care of that.
     *
     * @return bool True on success and false on failure.
     *
     * @throws \Psr\SimpleCache\InvalidArgumentException
     *   MUST be thrown if $values is neither an array nor a Traversable,
     *   or if any of the $values are not a legal value.
     */
<<<<<<< HEAD
    public function setMultiple($values, $ttl = null);
=======
    public function setMultiple(iterable $values, null|int|\DateInterval $ttl = null): bool;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * Deletes multiple cache items in a single operation.
     *
<<<<<<< HEAD
     * @param iterable $keys A list of string-based keys to be deleted.
=======
     * @param iterable<string> $keys A list of string-based keys to be deleted.
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     *
     * @return bool True if the items were successfully removed. False if there was an error.
     *
     * @throws \Psr\SimpleCache\InvalidArgumentException
     *   MUST be thrown if $keys is neither an array nor a Traversable,
     *   or if any of the $keys are not a legal value.
     */
<<<<<<< HEAD
    public function deleteMultiple($keys);
=======
    public function deleteMultiple(iterable $keys): bool;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

    /**
     * Determines whether an item is present in the cache.
     *
     * NOTE: It is recommended that has() is only to be used for cache warming type purposes
     * and not to be used within your live applications operations for get/set, as this method
     * is subject to a race condition where your has() will return true and immediately after,
     * another script can remove it making the state of your app out of date.
     *
     * @param string $key The cache item key.
     *
     * @return bool
     *
     * @throws \Psr\SimpleCache\InvalidArgumentException
     *   MUST be thrown if the $key string is not a legal value.
     */
<<<<<<< HEAD
    public function has($key);
=======
    public function has(string $key): bool;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
}