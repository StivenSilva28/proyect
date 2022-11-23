<?php

namespace Illuminate\Support\Traits;

use CachingIterator;
use Closure;
use Exception;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Enumerable;
use Illuminate\Support\HigherOrderCollectionProxy;
<<<<<<< HEAD
use Illuminate\Support\HigherOrderWhenProxy;
=======
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
use JsonSerializable;
use Symfony\Component\VarDumper\VarDumper;
use Traversable;
use UnexpectedValueException;
use UnitEnum;

/**
<<<<<<< HEAD
=======
 * @template TKey of array-key
 * @template TValue
 *
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
 * @property-read HigherOrderCollectionProxy $average
 * @property-read HigherOrderCollectionProxy $avg
 * @property-read HigherOrderCollectionProxy $contains
 * @property-read HigherOrderCollectionProxy $doesntContain
 * @property-read HigherOrderCollectionProxy $each
 * @property-read HigherOrderCollectionProxy $every
 * @property-read HigherOrderCollectionProxy $filter
 * @property-read HigherOrderCollectionProxy $first
 * @property-read HigherOrderCollectionProxy $flatMap
 * @property-read HigherOrderCollectionProxy $groupBy
 * @property-read HigherOrderCollectionProxy $keyBy
 * @property-read HigherOrderCollectionProxy $map
 * @property-read HigherOrderCollectionProxy $max
 * @property-read HigherOrderCollectionProxy $min
 * @property-read HigherOrderCollectionProxy $partition
 * @property-read HigherOrderCollectionProxy $reject
<<<<<<< HEAD
 * @property-read HigherOrderCollectionProxy $some
 * @property-read HigherOrderCollectionProxy $sortBy
 * @property-read HigherOrderCollectionProxy $sortByDesc
 * @property-read HigherOrderCollectionProxy $skipUntil
 * @property-read HigherOrderCollectionProxy $skipWhile
=======
 * @property-read HigherOrderCollectionProxy $skipUntil
 * @property-read HigherOrderCollectionProxy $skipWhile
 * @property-read HigherOrderCollectionProxy $some
 * @property-read HigherOrderCollectionProxy $sortBy
 * @property-read HigherOrderCollectionProxy $sortByDesc
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
 * @property-read HigherOrderCollectionProxy $sum
 * @property-read HigherOrderCollectionProxy $takeUntil
 * @property-read HigherOrderCollectionProxy $takeWhile
 * @property-read HigherOrderCollectionProxy $unique
<<<<<<< HEAD
 * @property-read HigherOrderCollectionProxy $until
 */
trait EnumeratesValues
{
=======
 * @property-read HigherOrderCollectionProxy $unless
 * @property-read HigherOrderCollectionProxy $until
 * @property-read HigherOrderCollectionProxy $when
 */
trait EnumeratesValues
{
    use Conditionable;

>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    /**
     * Indicates that the object's string representation should be escaped when __toString is invoked.
     *
     * @var bool
     */
    protected $escapeWhenCastingToString = false;

    /**
     * The methods that can be proxied.
     *
<<<<<<< HEAD
     * @var string[]
=======
     * @var array<int, string>
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    protected static $proxies = [
        'average',
        'avg',
        'contains',
        'doesntContain',
        'each',
        'every',
        'filter',
        'first',
        'flatMap',
        'groupBy',
        'keyBy',
        'map',
        'max',
        'min',
        'partition',
        'reject',
        'skipUntil',
        'skipWhile',
        'some',
        'sortBy',
        'sortByDesc',
        'sum',
        'takeUntil',
        'takeWhile',
        'unique',
<<<<<<< HEAD
        'until',
=======
        'unless',
        'until',
        'when',
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    ];

    /**
     * Create a new collection instance if the value isn't one already.
     *
<<<<<<< HEAD
     * @param  mixed  $items
     * @return static
=======
     * @template TMakeKey of array-key
     * @template TMakeValue
     *
     * @param  \Illuminate\Contracts\Support\Arrayable<TMakeKey, TMakeValue>|iterable<TMakeKey, TMakeValue>|null  $items
     * @return static<TMakeKey, TMakeValue>
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    public static function make($items = [])
    {
        return new static($items);
    }

    /**
     * Wrap the given value in a collection if applicable.
     *
<<<<<<< HEAD
     * @param  mixed  $value
     * @return static
=======
     * @template TWrapKey of array-key
     * @template TWrapValue
     *
     * @param  iterable<TWrapKey, TWrapValue>  $value
     * @return static<TWrapKey, TWrapValue>
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    public static function wrap($value)
    {
        return $value instanceof Enumerable
            ? new static($value)
            : new static(Arr::wrap($value));
    }

    /**
     * Get the underlying items from the given collection if applicable.
     *
<<<<<<< HEAD
     * @param  array|static  $value
     * @return array
=======
     * @template TUnwrapKey of array-key
     * @template TUnwrapValue
     *
     * @param  array<TUnwrapKey, TUnwrapValue>|static<TUnwrapKey, TUnwrapValue>  $value
     * @return array<TUnwrapKey, TUnwrapValue>
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    public static function unwrap($value)
    {
        return $value instanceof Enumerable ? $value->all() : $value;
    }

    /**
     * Create a new instance with no items.
     *
     * @return static
     */
    public static function empty()
    {
        return new static([]);
    }

    /**
     * Create a new collection by invoking the callback a given amount of times.
     *
<<<<<<< HEAD
     * @param  int  $number
     * @param  callable|null  $callback
     * @return static
=======
     * @template TTimesValue
     *
     * @param  int  $number
     * @param  (callable(int): TTimesValue)|null  $callback
     * @return static<int, TTimesValue>
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    public static function times($number, callable $callback = null)
    {
        if ($number < 1) {
            return new static;
        }

        return static::range(1, $number)
<<<<<<< HEAD
            ->when($callback)
=======
            ->unless($callback == null)
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            ->map($callback);
    }

    /**
     * Alias for the "avg" method.
     *
<<<<<<< HEAD
     * @param  callable|string|null  $callback
     * @return mixed
=======
     * @param  (callable(TValue): float|int)|string|null  $callback
     * @return float|int|null
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    public function average($callback = null)
    {
        return $this->avg($callback);
    }

    /**
     * Alias for the "contains" method.
     *
<<<<<<< HEAD
     * @param  mixed  $key
=======
     * @param  (callable(TValue, TKey): bool)|TValue|string  $key
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * @param  mixed  $operator
     * @param  mixed  $value
     * @return bool
     */
    public function some($key, $operator = null, $value = null)
    {
        return $this->contains(...func_get_args());
    }

    /**
     * Determine if an item exists, using strict comparison.
     *
<<<<<<< HEAD
     * @param  mixed  $key
     * @param  mixed  $value
=======
     * @param  (callable(TValue): bool)|TValue|array-key  $key
     * @param  TValue|null  $value
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * @return bool
     */
    public function containsStrict($key, $value = null)
    {
        if (func_num_args() === 2) {
<<<<<<< HEAD
            return $this->contains(function ($item) use ($key, $value) {
                return data_get($item, $key) === $value;
            });
=======
            return $this->contains(fn ($item) => data_get($item, $key) === $value);
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
        }

        if ($this->useAsCallable($key)) {
            return ! is_null($this->first($key));
        }

        foreach ($this as $item) {
            if ($item === $key) {
                return true;
            }
        }

        return false;
    }

    /**
     * Dump the items and end the script.
     *
     * @param  mixed  ...$args
<<<<<<< HEAD
     * @return void
=======
     * @return never
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    public function dd(...$args)
    {
        $this->dump(...$args);

        exit(1);
    }

    /**
     * Dump the items.
     *
     * @return $this
     */
    public function dump()
    {
        (new Collection(func_get_args()))
            ->push($this->all())
            ->each(function ($item) {
                VarDumper::dump($item);
            });

        return $this;
    }

    /**
     * Execute a callback over each item.
     *
<<<<<<< HEAD
     * @param  callable  $callback
=======
     * @param  callable(TValue, TKey): mixed  $callback
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * @return $this
     */
    public function each(callable $callback)
    {
        foreach ($this as $key => $item) {
            if ($callback($item, $key) === false) {
                break;
            }
        }

        return $this;
    }

    /**
     * Execute a callback over each nested chunk of items.
     *
<<<<<<< HEAD
     * @param  callable  $callback
=======
     * @param  callable(...mixed): mixed  $callback
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * @return static
     */
    public function eachSpread(callable $callback)
    {
        return $this->each(function ($chunk, $key) use ($callback) {
            $chunk[] = $key;

            return $callback(...$chunk);
        });
    }

    /**
     * Determine if all items pass the given truth test.
     *
<<<<<<< HEAD
     * @param  string|callable  $key
=======
     * @param  (callable(TValue, TKey): bool)|TValue|string  $key
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * @param  mixed  $operator
     * @param  mixed  $value
     * @return bool
     */
    public function every($key, $operator = null, $value = null)
    {
        if (func_num_args() === 1) {
            $callback = $this->valueRetriever($key);

            foreach ($this as $k => $v) {
                if (! $callback($v, $k)) {
                    return false;
                }
            }

            return true;
        }

        return $this->every($this->operatorForWhere(...func_get_args()));
    }

    /**
     * Get the first item by the given key value pair.
     *
<<<<<<< HEAD
     * @param  string  $key
     * @param  mixed  $operator
     * @param  mixed  $value
     * @return mixed
=======
     * @param  callable|string  $key
     * @param  mixed  $operator
     * @param  mixed  $value
     * @return TValue|null
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    public function firstWhere($key, $operator = null, $value = null)
    {
        return $this->first($this->operatorForWhere(...func_get_args()));
    }

    /**
<<<<<<< HEAD
=======
     * Get a single key's value from the first matching item in the collection.
     *
     * @param  string  $key
     * @param  mixed  $default
     * @return mixed
     */
    public function value($key, $default = null)
    {
        if ($value = $this->firstWhere($key)) {
            return data_get($value, $key, $default);
        }

        return value($default);
    }

    /**
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * Determine if the collection is not empty.
     *
     * @return bool
     */
    public function isNotEmpty()
    {
        return ! $this->isEmpty();
    }

    /**
     * Run a map over each nested chunk of items.
     *
<<<<<<< HEAD
     * @param  callable  $callback
     * @return static
=======
     * @template TMapSpreadValue
     *
     * @param  callable(mixed): TMapSpreadValue  $callback
     * @return static<TKey, TMapSpreadValue>
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    public function mapSpread(callable $callback)
    {
        return $this->map(function ($chunk, $key) use ($callback) {
            $chunk[] = $key;

            return $callback(...$chunk);
        });
    }

    /**
     * Run a grouping map over the items.
     *
     * The callback should return an associative array with a single key/value pair.
     *
<<<<<<< HEAD
     * @param  callable  $callback
     * @return static
=======
     * @template TMapToGroupsKey of array-key
     * @template TMapToGroupsValue
     *
     * @param  callable(TValue, TKey): array<TMapToGroupsKey, TMapToGroupsValue>  $callback
     * @return static<TMapToGroupsKey, static<int, TMapToGroupsValue>>
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    public function mapToGroups(callable $callback)
    {
        $groups = $this->mapToDictionary($callback);

        return $groups->map([$this, 'make']);
    }

    /**
     * Map a collection and flatten the result by a single level.
     *
<<<<<<< HEAD
     * @param  callable  $callback
     * @return static
=======
     * @param  callable(TValue, TKey): mixed  $callback
     * @return static<int, mixed>
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    public function flatMap(callable $callback)
    {
        return $this->map($callback)->collapse();
    }

    /**
     * Map the values into a new class.
     *
<<<<<<< HEAD
     * @param  string  $class
     * @return static
     */
    public function mapInto($class)
    {
        return $this->map(function ($value, $key) use ($class) {
            return new $class($value, $key);
        });
=======
     * @template TMapIntoValue
     *
     * @param  class-string<TMapIntoValue>  $class
     * @return static<TKey, TMapIntoValue>
     */
    public function mapInto($class)
    {
        return $this->map(fn ($value, $key) => new $class($value, $key));
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }

    /**
     * Get the min value of a given key.
     *
<<<<<<< HEAD
     * @param  callable|string|null  $callback
=======
     * @param  (callable(TValue):mixed)|string|null  $callback
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * @return mixed
     */
    public function min($callback = null)
    {
        $callback = $this->valueRetriever($callback);

<<<<<<< HEAD
        return $this->map(function ($value) use ($callback) {
            return $callback($value);
        })->filter(function ($value) {
            return ! is_null($value);
        })->reduce(function ($result, $value) {
            return is_null($result) || $value < $result ? $value : $result;
        });
=======
        return $this->map(fn ($value) => $callback($value))
            ->filter(fn ($value) => ! is_null($value))
            ->reduce(fn ($result, $value) => is_null($result) || $value < $result ? $value : $result);
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }

    /**
     * Get the max value of a given key.
     *
<<<<<<< HEAD
     * @param  callable|string|null  $callback
=======
     * @param  (callable(TValue):mixed)|string|null  $callback
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * @return mixed
     */
    public function max($callback = null)
    {
        $callback = $this->valueRetriever($callback);

<<<<<<< HEAD
        return $this->filter(function ($value) {
            return ! is_null($value);
        })->reduce(function ($result, $item) use ($callback) {
=======
        return $this->filter(fn ($value) => ! is_null($value))->reduce(function ($result, $item) use ($callback) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            $value = $callback($item);

            return is_null($result) || $value > $result ? $value : $result;
        });
    }

    /**
     * "Paginate" the collection by slicing it into a smaller collection.
     *
     * @param  int  $page
     * @param  int  $perPage
     * @return static
     */
    public function forPage($page, $perPage)
    {
        $offset = max(0, ($page - 1) * $perPage);

        return $this->slice($offset, $perPage);
    }

    /**
     * Partition the collection into two arrays using the given callback or key.
     *
<<<<<<< HEAD
     * @param  callable|string  $key
     * @param  mixed  $operator
     * @param  mixed  $value
     * @return static
=======
     * @param  (callable(TValue, TKey): bool)|TValue|string  $key
     * @param  TValue|string|null  $operator
     * @param  TValue|null  $value
     * @return static<int<0, 1>, static<TKey, TValue>>
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    public function partition($key, $operator = null, $value = null)
    {
        $passed = [];
        $failed = [];

        $callback = func_num_args() === 1
                ? $this->valueRetriever($key)
                : $this->operatorForWhere(...func_get_args());

        foreach ($this as $key => $item) {
            if ($callback($item, $key)) {
                $passed[$key] = $item;
            } else {
                $failed[$key] = $item;
            }
        }

        return new static([new static($passed), new static($failed)]);
    }

    /**
     * Get the sum of the given values.
     *
<<<<<<< HEAD
     * @param  callable|string|null  $callback
=======
     * @param  (callable(TValue): mixed)|string|null  $callback
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * @return mixed
     */
    public function sum($callback = null)
    {
        $callback = is_null($callback)
            ? $this->identity()
            : $this->valueRetriever($callback);

<<<<<<< HEAD
        return $this->reduce(function ($result, $item) use ($callback) {
            return $result + $callback($item);
        }, 0);
    }

    /**
     * Apply the callback if the value is truthy.
     *
     * @param  bool|mixed  $value
     * @param  callable|null  $callback
     * @param  callable|null  $default
     * @return static|mixed
     */
    public function when($value, callable $callback = null, callable $default = null)
    {
        if (! $callback) {
            return new HigherOrderWhenProxy($this, $value);
        }

        if ($value) {
            return $callback($this, $value);
        } elseif ($default) {
            return $default($this, $value);
        }

        return $this;
=======
        return $this->reduce(fn ($result, $item) => $result + $callback($item), 0);
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }

    /**
     * Apply the callback if the collection is empty.
     *
<<<<<<< HEAD
     * @param  callable  $callback
     * @param  callable|null  $default
     * @return static|mixed
=======
     * @template TWhenEmptyReturnType
     *
     * @param  (callable($this): TWhenEmptyReturnType)  $callback
     * @param  (callable($this): TWhenEmptyReturnType)|null  $default
     * @return $this|TWhenEmptyReturnType
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    public function whenEmpty(callable $callback, callable $default = null)
    {
        return $this->when($this->isEmpty(), $callback, $default);
    }

    /**
     * Apply the callback if the collection is not empty.
     *
<<<<<<< HEAD
     * @param  callable  $callback
     * @param  callable|null  $default
     * @return static|mixed
=======
     * @template TWhenNotEmptyReturnType
     *
     * @param  callable($this): TWhenNotEmptyReturnType  $callback
     * @param  (callable($this): TWhenNotEmptyReturnType)|null  $default
     * @return $this|TWhenNotEmptyReturnType
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    public function whenNotEmpty(callable $callback, callable $default = null)
    {
        return $this->when($this->isNotEmpty(), $callback, $default);
    }

    /**
<<<<<<< HEAD
     * Apply the callback if the value is falsy.
     *
     * @param  bool  $value
     * @param  callable  $callback
     * @param  callable|null  $default
     * @return static|mixed
     */
    public function unless($value, callable $callback, callable $default = null)
    {
        return $this->when(! $value, $callback, $default);
    }

    /**
     * Apply the callback unless the collection is empty.
     *
     * @param  callable  $callback
     * @param  callable|null  $default
     * @return static|mixed
=======
     * Apply the callback unless the collection is empty.
     *
     * @template TUnlessEmptyReturnType
     *
     * @param  callable($this): TUnlessEmptyReturnType  $callback
     * @param  (callable($this): TUnlessEmptyReturnType)|null  $default
     * @return $this|TUnlessEmptyReturnType
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    public function unlessEmpty(callable $callback, callable $default = null)
    {
        return $this->whenNotEmpty($callback, $default);
    }

    /**
     * Apply the callback unless the collection is not empty.
     *
<<<<<<< HEAD
     * @param  callable  $callback
     * @param  callable|null  $default
     * @return static|mixed
=======
     * @template TUnlessNotEmptyReturnType
     *
     * @param  callable($this): TUnlessNotEmptyReturnType  $callback
     * @param  (callable($this): TUnlessNotEmptyReturnType)|null  $default
     * @return $this|TUnlessNotEmptyReturnType
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    public function unlessNotEmpty(callable $callback, callable $default = null)
    {
        return $this->whenEmpty($callback, $default);
    }

    /**
     * Filter items by the given key value pair.
     *
<<<<<<< HEAD
     * @param  string  $key
=======
     * @param  callable|string  $key
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * @param  mixed  $operator
     * @param  mixed  $value
     * @return static
     */
    public function where($key, $operator = null, $value = null)
    {
        return $this->filter($this->operatorForWhere(...func_get_args()));
    }

    /**
     * Filter items where the value for the given key is null.
     *
     * @param  string|null  $key
     * @return static
     */
    public function whereNull($key = null)
    {
        return $this->whereStrict($key, null);
    }

    /**
     * Filter items where the value for the given key is not null.
     *
     * @param  string|null  $key
     * @return static
     */
    public function whereNotNull($key = null)
    {
        return $this->where($key, '!==', null);
    }

    /**
     * Filter items by the given key value pair using strict comparison.
     *
     * @param  string  $key
     * @param  mixed  $value
     * @return static
     */
    public function whereStrict($key, $value)
    {
        return $this->where($key, '===', $value);
    }

    /**
     * Filter items by the given key value pair.
     *
     * @param  string  $key
<<<<<<< HEAD
     * @param  mixed  $values
=======
     * @param  \Illuminate\Contracts\Support\Arrayable|iterable  $values
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * @param  bool  $strict
     * @return static
     */
    public function whereIn($key, $values, $strict = false)
    {
        $values = $this->getArrayableItems($values);

<<<<<<< HEAD
        return $this->filter(function ($item) use ($key, $values, $strict) {
            return in_array(data_get($item, $key), $values, $strict);
        });
=======
        return $this->filter(fn ($item) => in_array(data_get($item, $key), $values, $strict));
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }

    /**
     * Filter items by the given key value pair using strict comparison.
     *
     * @param  string  $key
<<<<<<< HEAD
     * @param  mixed  $values
=======
     * @param  \Illuminate\Contracts\Support\Arrayable|iterable  $values
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * @return static
     */
    public function whereInStrict($key, $values)
    {
        return $this->whereIn($key, $values, true);
    }

    /**
     * Filter items such that the value of the given key is between the given values.
     *
     * @param  string  $key
<<<<<<< HEAD
     * @param  array  $values
=======
     * @param  \Illuminate\Contracts\Support\Arrayable|iterable  $values
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * @return static
     */
    public function whereBetween($key, $values)
    {
        return $this->where($key, '>=', reset($values))->where($key, '<=', end($values));
    }

    /**
     * Filter items such that the value of the given key is not between the given values.
     *
     * @param  string  $key
<<<<<<< HEAD
     * @param  array  $values
=======
     * @param  \Illuminate\Contracts\Support\Arrayable|iterable  $values
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * @return static
     */
    public function whereNotBetween($key, $values)
    {
<<<<<<< HEAD
        return $this->filter(function ($item) use ($key, $values) {
            return data_get($item, $key) < reset($values) || data_get($item, $key) > end($values);
        });
=======
        return $this->filter(
            fn ($item) => data_get($item, $key) < reset($values) || data_get($item, $key) > end($values)
        );
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }

    /**
     * Filter items by the given key value pair.
     *
     * @param  string  $key
<<<<<<< HEAD
     * @param  mixed  $values
=======
     * @param  \Illuminate\Contracts\Support\Arrayable|iterable  $values
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * @param  bool  $strict
     * @return static
     */
    public function whereNotIn($key, $values, $strict = false)
    {
        $values = $this->getArrayableItems($values);

<<<<<<< HEAD
        return $this->reject(function ($item) use ($key, $values, $strict) {
            return in_array(data_get($item, $key), $values, $strict);
        });
=======
        return $this->reject(fn ($item) => in_array(data_get($item, $key), $values, $strict));
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }

    /**
     * Filter items by the given key value pair using strict comparison.
     *
     * @param  string  $key
<<<<<<< HEAD
     * @param  mixed  $values
=======
     * @param  \Illuminate\Contracts\Support\Arrayable|iterable  $values
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * @return static
     */
    public function whereNotInStrict($key, $values)
    {
        return $this->whereNotIn($key, $values, true);
    }

    /**
     * Filter the items, removing any items that don't match the given type(s).
     *
<<<<<<< HEAD
     * @param  string|string[]  $type
     * @return static
=======
     * @template TWhereInstanceOf
     *
     * @param  class-string<TWhereInstanceOf>|array<array-key, class-string<TWhereInstanceOf>>  $type
     * @return static<TKey, TWhereInstanceOf>
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    public function whereInstanceOf($type)
    {
        return $this->filter(function ($value) use ($type) {
            if (is_array($type)) {
                foreach ($type as $classType) {
                    if ($value instanceof $classType) {
                        return true;
                    }
                }

                return false;
            }

            return $value instanceof $type;
        });
    }

    /**
     * Pass the collection to the given callback and return the result.
     *
<<<<<<< HEAD
     * @param  callable  $callback
     * @return mixed
=======
     * @template TPipeReturnType
     *
     * @param  callable($this): TPipeReturnType  $callback
     * @return TPipeReturnType
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    public function pipe(callable $callback)
    {
        return $callback($this);
    }

    /**
     * Pass the collection into a new class.
     *
<<<<<<< HEAD
     * @param  string  $class
=======
     * @param  class-string  $class
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * @return mixed
     */
    public function pipeInto($class)
    {
        return new $class($this);
    }

    /**
     * Pass the collection through a series of callable pipes and return the result.
     *
<<<<<<< HEAD
     * @param  array<callable>  $pipes
     * @return mixed
     */
    public function pipeThrough($pipes)
    {
        return static::make($pipes)->reduce(
            function ($carry, $pipe) {
                return $pipe($carry);
            },
=======
     * @param  array<callable>  $callbacks
     * @return mixed
     */
    public function pipeThrough($callbacks)
    {
        return Collection::make($callbacks)->reduce(
            fn ($carry, $callback) => $callback($carry),
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            $this,
        );
    }

    /**
<<<<<<< HEAD
     * Pass the collection to the given callback and then return it.
     *
     * @param  callable  $callback
     * @return $this
     */
    public function tap(callable $callback)
    {
        $callback(clone $this);

        return $this;
    }

    /**
     * Reduce the collection to a single value.
     *
     * @param  callable  $callback
     * @param  mixed  $initial
     * @return mixed
=======
     * Reduce the collection to a single value.
     *
     * @template TReduceInitial
     * @template TReduceReturnType
     *
     * @param  callable(TReduceInitial|TReduceReturnType, TValue, TKey): TReduceReturnType  $callback
     * @param  TReduceInitial  $initial
     * @return TReduceReturnType
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    public function reduce(callable $callback, $initial = null)
    {
        $result = $initial;

        foreach ($this as $key => $value) {
            $result = $callback($result, $value, $key);
        }

        return $result;
    }

    /**
     * Reduce the collection to multiple aggregate values.
     *
     * @param  callable  $callback
     * @param  mixed  ...$initial
     * @return array
     *
<<<<<<< HEAD
     * @deprecated Use "reduceSpread" instead
     *
     * @throws \UnexpectedValueException
     */
    public function reduceMany(callable $callback, ...$initial)
    {
        return $this->reduceSpread($callback, ...$initial);
    }

    /**
     * Reduce the collection to multiple aggregate values.
     *
     * @param  callable  $callback
     * @param  mixed  ...$initial
     * @return array
     *
=======
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * @throws \UnexpectedValueException
     */
    public function reduceSpread(callable $callback, ...$initial)
    {
        $result = $initial;

        foreach ($this as $key => $value) {
            $result = call_user_func_array($callback, array_merge($result, [$value, $key]));

            if (! is_array($result)) {
                throw new UnexpectedValueException(sprintf(
<<<<<<< HEAD
                    "%s::reduceMany expects reducer to return an array, but got a '%s' instead.",
=======
                    "%s::reduceSpread expects reducer to return an array, but got a '%s' instead.",
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
                    class_basename(static::class), gettype($result)
                ));
            }
        }

        return $result;
    }

    /**
<<<<<<< HEAD
     * Reduce an associative collection to a single value.
     *
     * @param  callable  $callback
     * @param  mixed  $initial
     * @return mixed
     */
    public function reduceWithKeys(callable $callback, $initial = null)
    {
        return $this->reduce($callback, $initial);
    }

    /**
     * Create a collection of all elements that do not pass a given truth test.
     *
     * @param  callable|mixed  $callback
=======
     * Create a collection of all elements that do not pass a given truth test.
     *
     * @param  (callable(TValue, TKey): bool)|bool  $callback
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * @return static
     */
    public function reject($callback = true)
    {
        $useAsCallable = $this->useAsCallable($callback);

        return $this->filter(function ($value, $key) use ($callback, $useAsCallable) {
            return $useAsCallable
                ? ! $callback($value, $key)
                : $value != $callback;
        });
    }

    /**
<<<<<<< HEAD
     * Return only unique items from the collection array using strict comparison.
     *
     * @param  string|callable|null  $key
=======
     * Pass the collection to the given callback and then return it.
     *
     * @param  callable($this): mixed  $callback
     * @return $this
     */
    public function tap(callable $callback)
    {
        $callback($this);

        return $this;
    }

    /**
     * Return only unique items from the collection array.
     *
     * @param  (callable(TValue, TKey): mixed)|string|null  $key
     * @param  bool  $strict
     * @return static
     */
    public function unique($key = null, $strict = false)
    {
        $callback = $this->valueRetriever($key);

        $exists = [];

        return $this->reject(function ($item, $key) use ($callback, $strict, &$exists) {
            if (in_array($id = $callback($item, $key), $exists, $strict)) {
                return true;
            }

            $exists[] = $id;
        });
    }

    /**
     * Return only unique items from the collection array using strict comparison.
     *
     * @param  (callable(TValue, TKey): mixed)|string|null  $key
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * @return static
     */
    public function uniqueStrict($key = null)
    {
        return $this->unique($key, true);
    }

    /**
     * Collect the values into a collection.
     *
<<<<<<< HEAD
     * @return \Illuminate\Support\Collection
=======
     * @return \Illuminate\Support\Collection<TKey, TValue>
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    public function collect()
    {
        return new Collection($this->all());
    }

    /**
     * Get the collection of items as a plain array.
     *
<<<<<<< HEAD
     * @return array
     */
    public function toArray()
    {
        return $this->map(function ($value) {
            return $value instanceof Arrayable ? $value->toArray() : $value;
        })->all();
=======
     * @return array<TKey, mixed>
     */
    public function toArray()
    {
        return $this->map(fn ($value) => $value instanceof Arrayable ? $value->toArray() : $value)->all();
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
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
     * @return array<TKey, mixed>
     */
    public function jsonSerialize(): array
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return array_map(function ($value) {
            if ($value instanceof JsonSerializable) {
                return $value->jsonSerialize();
            } elseif ($value instanceof Jsonable) {
                return json_decode($value->toJson(), true);
            } elseif ($value instanceof Arrayable) {
                return $value->toArray();
            }

            return $value;
        }, $this->all());
    }

    /**
     * Get the collection of items as JSON.
     *
     * @param  int  $options
     * @return string
     */
    public function toJson($options = 0)
    {
        return json_encode($this->jsonSerialize(), $options);
    }

    /**
     * Get a CachingIterator instance.
     *
     * @param  int  $flags
     * @return \CachingIterator
     */
    public function getCachingIterator($flags = CachingIterator::CALL_TOSTRING)
    {
        return new CachingIterator($this->getIterator(), $flags);
    }

    /**
     * Convert the collection to its string representation.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->escapeWhenCastingToString
                    ? e($this->toJson())
                    : $this->toJson();
    }

    /**
     * Indicate that the model's string representation should be escaped when __toString is invoked.
     *
     * @param  bool  $escape
     * @return $this
     */
    public function escapeWhenCastingToString($escape = true)
    {
        $this->escapeWhenCastingToString = $escape;

        return $this;
    }

    /**
     * Add a method to the list of proxied methods.
     *
     * @param  string  $method
     * @return void
     */
    public static function proxy($method)
    {
        static::$proxies[] = $method;
    }

    /**
     * Dynamically access collection proxies.
     *
     * @param  string  $key
     * @return mixed
     *
     * @throws \Exception
     */
    public function __get($key)
    {
        if (! in_array($key, static::$proxies)) {
            throw new Exception("Property [{$key}] does not exist on this collection instance.");
        }

        return new HigherOrderCollectionProxy($this, $key);
    }

    /**
     * Results array of items from Collection or Arrayable.
     *
     * @param  mixed  $items
<<<<<<< HEAD
     * @return array
=======
     * @return array<TKey, TValue>
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    protected function getArrayableItems($items)
    {
        if (is_array($items)) {
            return $items;
        } elseif ($items instanceof Enumerable) {
            return $items->all();
        } elseif ($items instanceof Arrayable) {
            return $items->toArray();
<<<<<<< HEAD
=======
        } elseif ($items instanceof Traversable) {
            return iterator_to_array($items);
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
        } elseif ($items instanceof Jsonable) {
            return json_decode($items->toJson(), true);
        } elseif ($items instanceof JsonSerializable) {
            return (array) $items->jsonSerialize();
<<<<<<< HEAD
        } elseif ($items instanceof Traversable) {
            return iterator_to_array($items);
=======
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
        } elseif ($items instanceof UnitEnum) {
            return [$items];
        }

        return (array) $items;
    }

    /**
     * Get an operator checker callback.
     *
<<<<<<< HEAD
     * @param  string  $key
=======
     * @param  callable|string  $key
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * @param  string|null  $operator
     * @param  mixed  $value
     * @return \Closure
     */
    protected function operatorForWhere($key, $operator = null, $value = null)
    {
<<<<<<< HEAD
=======
        if ($this->useAsCallable($key)) {
            return $key;
        }

>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
        if (func_num_args() === 1) {
            $value = true;

            $operator = '=';
        }

        if (func_num_args() === 2) {
            $value = $operator;

            $operator = '=';
        }

        return function ($item) use ($key, $operator, $value) {
            $retrieved = data_get($item, $key);

            $strings = array_filter([$retrieved, $value], function ($value) {
                return is_string($value) || (is_object($value) && method_exists($value, '__toString'));
            });

            if (count($strings) < 2 && count(array_filter([$retrieved, $value], 'is_object')) == 1) {
                return in_array($operator, ['!=', '<>', '!==']);
            }

            switch ($operator) {
                default:
                case '=':
                case '==':  return $retrieved == $value;
                case '!=':
                case '<>':  return $retrieved != $value;
                case '<':   return $retrieved < $value;
                case '>':   return $retrieved > $value;
                case '<=':  return $retrieved <= $value;
                case '>=':  return $retrieved >= $value;
                case '===': return $retrieved === $value;
                case '!==': return $retrieved !== $value;
<<<<<<< HEAD
=======
                case '<=>': return $retrieved <=> $value;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            }
        };
    }

    /**
     * Determine if the given value is callable, but not a string.
     *
     * @param  mixed  $value
     * @return bool
     */
    protected function useAsCallable($value)
    {
        return ! is_string($value) && is_callable($value);
    }

    /**
     * Get a value retrieving callback.
     *
     * @param  callable|string|null  $value
     * @return callable
     */
    protected function valueRetriever($value)
    {
        if ($this->useAsCallable($value)) {
            return $value;
        }

<<<<<<< HEAD
        return function ($item) use ($value) {
            return data_get($item, $value);
        };
=======
        return fn ($item) => data_get($item, $value);
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }

    /**
     * Make a function to check an item's equality.
     *
     * @param  mixed  $value
<<<<<<< HEAD
     * @return \Closure
     */
    protected function equality($value)
    {
        return function ($item) use ($value) {
            return $item === $value;
        };
=======
     * @return \Closure(mixed): bool
     */
    protected function equality($value)
    {
        return fn ($item) => $item === $value;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }

    /**
     * Make a function using another function, by negating its result.
     *
     * @param  \Closure  $callback
     * @return \Closure
     */
    protected function negate(Closure $callback)
    {
<<<<<<< HEAD
        return function (...$params) use ($callback) {
            return ! $callback(...$params);
        };
=======
        return fn (...$params) => ! $callback(...$params);
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }

    /**
     * Make a function that returns what's passed to it.
     *
<<<<<<< HEAD
     * @return \Closure
     */
    protected function identity()
    {
        return function ($value) {
            return $value;
        };
=======
     * @return \Closure(TValue): TValue
     */
    protected function identity()
    {
        return fn ($value) => $value;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }
}
