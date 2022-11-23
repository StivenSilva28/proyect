<?php

namespace Illuminate\Database\Eloquent;

use Illuminate\Contracts\Queue\QueueableCollection;
use Illuminate\Contracts\Queue\QueueableEntity;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection as BaseCollection;
<<<<<<< HEAD
use Illuminate\Support\Str;
use LogicException;

=======
use LogicException;

/**
 * @template TKey of array-key
 * @template TModel of \Illuminate\Database\Eloquent\Model
 *
 * @extends \Illuminate\Support\Collection<TKey, TModel>
 */
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
class Collection extends BaseCollection implements QueueableCollection
{
    /**
     * Find a model in the collection by key.
     *
<<<<<<< HEAD
     * @param  mixed  $key
     * @param  mixed  $default
     * @return \Illuminate\Database\Eloquent\Model|static|null
=======
     * @template TFindDefault
     *
     * @param  mixed  $key
     * @param  TFindDefault  $default
     * @return static<TKey|TModel>|TModel|TFindDefault
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    public function find($key, $default = null)
    {
        if ($key instanceof Model) {
            $key = $key->getKey();
        }

        if ($key instanceof Arrayable) {
            $key = $key->toArray();
        }

        if (is_array($key)) {
            if ($this->isEmpty()) {
                return new static;
            }

            return $this->whereIn($this->first()->getKeyName(), $key);
        }

        return Arr::first($this->items, function ($model) use ($key) {
            return $model->getKey() == $key;
        }, $default);
    }

    /**
     * Load a set of relationships onto the collection.
     *
<<<<<<< HEAD
     * @param  array|string  $relations
=======
     * @param  array<array-key, (callable(\Illuminate\Database\Eloquent\Builder): mixed)|string>|string  $relations
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * @return $this
     */
    public function load($relations)
    {
        if ($this->isNotEmpty()) {
            if (is_string($relations)) {
                $relations = func_get_args();
            }

            $query = $this->first()->newQueryWithoutRelationships()->with($relations);

            $this->items = $query->eagerLoadRelations($this->items);
        }

        return $this;
    }

    /**
     * Load a set of aggregations over relationship's column onto the collection.
     *
<<<<<<< HEAD
     * @param  array|string  $relations
     * @param  string  $column
     * @param  string  $function
=======
     * @param  array<array-key, (callable(\Illuminate\Database\Eloquent\Builder): mixed)|string>|string  $relations
     * @param  string  $column
     * @param  string|null  $function
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * @return $this
     */
    public function loadAggregate($relations, $column, $function = null)
    {
        if ($this->isEmpty()) {
            return $this;
        }

        $models = $this->first()->newModelQuery()
            ->whereKey($this->modelKeys())
            ->select($this->first()->getKeyName())
            ->withAggregate($relations, $column, $function)
            ->get()
            ->keyBy($this->first()->getKeyName());

        $attributes = Arr::except(
            array_keys($models->first()->getAttributes()),
            $models->first()->getKeyName()
        );

        $this->each(function ($model) use ($models, $attributes) {
            $extraAttributes = Arr::only($models->get($model->getKey())->getAttributes(), $attributes);

            $model->forceFill($extraAttributes)
                ->syncOriginalAttributes($attributes)
                ->mergeCasts($models->get($model->getKey())->getCasts());
        });

        return $this;
    }

    /**
     * Load a set of relationship counts onto the collection.
     *
<<<<<<< HEAD
     * @param  array|string  $relations
=======
     * @param  array<array-key, (callable(\Illuminate\Database\Eloquent\Builder): mixed)|string>|string  $relations
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * @return $this
     */
    public function loadCount($relations)
    {
        return $this->loadAggregate($relations, '*', 'count');
    }

    /**
     * Load a set of relationship's max column values onto the collection.
     *
<<<<<<< HEAD
     * @param  array|string  $relations
=======
     * @param  array<array-key, (callable(\Illuminate\Database\Eloquent\Builder): mixed)|string>|string  $relations
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * @param  string  $column
     * @return $this
     */
    public function loadMax($relations, $column)
    {
        return $this->loadAggregate($relations, $column, 'max');
    }

    /**
     * Load a set of relationship's min column values onto the collection.
     *
<<<<<<< HEAD
     * @param  array|string  $relations
=======
     * @param  array<array-key, (callable(\Illuminate\Database\Eloquent\Builder): mixed)|string>|string  $relations
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * @param  string  $column
     * @return $this
     */
    public function loadMin($relations, $column)
    {
        return $this->loadAggregate($relations, $column, 'min');
    }

    /**
     * Load a set of relationship's column summations onto the collection.
     *
<<<<<<< HEAD
     * @param  array|string  $relations
=======
     * @param  array<array-key, (callable(\Illuminate\Database\Eloquent\Builder): mixed)|string>|string  $relations
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * @param  string  $column
     * @return $this
     */
    public function loadSum($relations, $column)
    {
        return $this->loadAggregate($relations, $column, 'sum');
    }

    /**
     * Load a set of relationship's average column values onto the collection.
     *
<<<<<<< HEAD
     * @param  array|string  $relations
=======
     * @param  array<array-key, (callable(\Illuminate\Database\Eloquent\Builder): mixed)|string>|string  $relations
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * @param  string  $column
     * @return $this
     */
    public function loadAvg($relations, $column)
    {
        return $this->loadAggregate($relations, $column, 'avg');
    }

    /**
     * Load a set of related existences onto the collection.
     *
<<<<<<< HEAD
     * @param  array|string  $relations
=======
     * @param  array<array-key, (callable(\Illuminate\Database\Eloquent\Builder): mixed)|string>|string  $relations
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * @return $this
     */
    public function loadExists($relations)
    {
        return $this->loadAggregate($relations, '*', 'exists');
    }

    /**
     * Load a set of relationships onto the collection if they are not already eager loaded.
     *
<<<<<<< HEAD
     * @param  array|string  $relations
=======
     * @param  array<array-key, (callable(\Illuminate\Database\Eloquent\Builder): mixed)|string>|string  $relations
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * @return $this
     */
    public function loadMissing($relations)
    {
        if (is_string($relations)) {
            $relations = func_get_args();
        }

        foreach ($relations as $key => $value) {
            if (is_numeric($key)) {
                $key = $value;
            }

            $segments = explode('.', explode(':', $key)[0]);

<<<<<<< HEAD
            if (Str::contains($key, ':')) {
=======
            if (str_contains($key, ':')) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
                $segments[count($segments) - 1] .= ':'.explode(':', $key)[1];
            }

            $path = [];

            foreach ($segments as $segment) {
                $path[] = [$segment => $segment];
            }

            if (is_callable($value)) {
                $path[count($segments) - 1][end($segments)] = $value;
            }

            $this->loadMissingRelation($this, $path);
        }

        return $this;
    }

    /**
     * Load a relationship path if it is not already eager loaded.
     *
     * @param  \Illuminate\Database\Eloquent\Collection  $models
     * @param  array  $path
     * @return void
     */
    protected function loadMissingRelation(self $models, array $path)
    {
        $relation = array_shift($path);

        $name = explode(':', key($relation))[0];

        if (is_string(reset($relation))) {
            $relation = reset($relation);
        }

        $models->filter(function ($model) use ($name) {
            return ! is_null($model) && ! $model->relationLoaded($name);
        })->load($relation);

        if (empty($path)) {
            return;
        }

        $models = $models->pluck($name)->whereNotNull();

        if ($models->first() instanceof BaseCollection) {
            $models = $models->collapse();
        }

        $this->loadMissingRelation(new static($models), $path);
    }

    /**
     * Load a set of relationships onto the mixed relationship collection.
     *
     * @param  string  $relation
<<<<<<< HEAD
     * @param  array  $relations
=======
     * @param  array<array-key, (callable(\Illuminate\Database\Eloquent\Builder): mixed)|string> $relations
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * @return $this
     */
    public function loadMorph($relation, $relations)
    {
        $this->pluck($relation)
            ->filter()
            ->groupBy(function ($model) {
                return get_class($model);
            })
            ->each(function ($models, $className) use ($relations) {
                static::make($models)->load($relations[$className] ?? []);
            });

        return $this;
    }

    /**
     * Load a set of relationship counts onto the mixed relationship collection.
     *
     * @param  string  $relation
<<<<<<< HEAD
     * @param  array  $relations
=======
     * @param  array<array-key, (callable(\Illuminate\Database\Eloquent\Builder): mixed)|string> $relations
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * @return $this
     */
    public function loadMorphCount($relation, $relations)
    {
        $this->pluck($relation)
            ->filter()
            ->groupBy(function ($model) {
                return get_class($model);
            })
            ->each(function ($models, $className) use ($relations) {
                static::make($models)->loadCount($relations[$className] ?? []);
            });

        return $this;
    }

    /**
     * Determine if a key exists in the collection.
     *
<<<<<<< HEAD
     * @param  mixed  $key
=======
     * @param  (callable(TModel, TKey): bool)|TModel|string|int  $key
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * @param  mixed  $operator
     * @param  mixed  $value
     * @return bool
     */
    public function contains($key, $operator = null, $value = null)
    {
        if (func_num_args() > 1 || $this->useAsCallable($key)) {
            return parent::contains(...func_get_args());
        }

        if ($key instanceof Model) {
            return parent::contains(function ($model) use ($key) {
                return $model->is($key);
            });
        }

        return parent::contains(function ($model) use ($key) {
            return $model->getKey() == $key;
        });
    }

    /**
     * Get the array of primary keys.
     *
<<<<<<< HEAD
     * @return array
=======
     * @return array<int, array-key>
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    public function modelKeys()
    {
        return array_map(function ($model) {
            return $model->getKey();
        }, $this->items);
    }

    /**
     * Merge the collection with the given items.
     *
<<<<<<< HEAD
     * @param  \ArrayAccess|array  $items
=======
     * @param  iterable<array-key, TModel>  $items
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * @return static
     */
    public function merge($items)
    {
        $dictionary = $this->getDictionary();

        foreach ($items as $item) {
            $dictionary[$item->getKey()] = $item;
        }

        return new static(array_values($dictionary));
    }

    /**
     * Run a map over each of the items.
     *
<<<<<<< HEAD
     * @param  callable  $callback
     * @return \Illuminate\Support\Collection|static
=======
     * @template TMapValue
     *
     * @param  callable(TModel, TKey): TMapValue  $callback
     * @return \Illuminate\Support\Collection<TKey, TMapValue>|static<TKey, TMapValue>
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    public function map(callable $callback)
    {
        $result = parent::map($callback);

        return $result->contains(function ($item) {
            return ! $item instanceof Model;
        }) ? $result->toBase() : $result;
    }

    /**
     * Run an associative map over each of the items.
     *
     * The callback should return an associative array with a single key / value pair.
     *
<<<<<<< HEAD
     * @param  callable  $callback
     * @return \Illuminate\Support\Collection|static
=======
     * @template TMapWithKeysKey of array-key
     * @template TMapWithKeysValue
     *
     * @param  callable(TModel, TKey): array<TMapWithKeysKey, TMapWithKeysValue>  $callback
     * @return \Illuminate\Support\Collection<TMapWithKeysKey, TMapWithKeysValue>|static<TMapWithKeysKey, TMapWithKeysValue>
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    public function mapWithKeys(callable $callback)
    {
        $result = parent::mapWithKeys($callback);

        return $result->contains(function ($item) {
            return ! $item instanceof Model;
        }) ? $result->toBase() : $result;
    }

    /**
     * Reload a fresh model instance from the database for all the entities.
     *
<<<<<<< HEAD
     * @param  array|string  $with
=======
     * @param  array<array-key, string>|string  $with
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * @return static
     */
    public function fresh($with = [])
    {
        if ($this->isEmpty()) {
            return new static;
        }

        $model = $this->first();

        $freshModels = $model->newQueryWithoutScopes()
            ->with(is_string($with) ? func_get_args() : $with)
            ->whereIn($model->getKeyName(), $this->modelKeys())
            ->get()
            ->getDictionary();

        return $this->filter(function ($model) use ($freshModels) {
            return $model->exists && isset($freshModels[$model->getKey()]);
        })
        ->map(function ($model) use ($freshModels) {
            return $freshModels[$model->getKey()];
        });
    }

    /**
     * Diff the collection with the given items.
     *
<<<<<<< HEAD
     * @param  \ArrayAccess|array  $items
=======
     * @param  iterable<array-key, TModel>  $items
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * @return static
     */
    public function diff($items)
    {
        $diff = new static;

        $dictionary = $this->getDictionary($items);

        foreach ($this->items as $item) {
            if (! isset($dictionary[$item->getKey()])) {
                $diff->add($item);
            }
        }

        return $diff;
    }

    /**
     * Intersect the collection with the given items.
     *
<<<<<<< HEAD
     * @param  \ArrayAccess|array  $items
=======
     * @param  iterable<array-key, TModel>  $items
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * @return static
     */
    public function intersect($items)
    {
        $intersect = new static;

        if (empty($items)) {
            return $intersect;
        }

        $dictionary = $this->getDictionary($items);

        foreach ($this->items as $item) {
            if (isset($dictionary[$item->getKey()])) {
                $intersect->add($item);
            }
        }

        return $intersect;
    }

    /**
     * Return only unique items from the collection.
     *
<<<<<<< HEAD
     * @param  string|callable|null  $key
     * @param  bool  $strict
     * @return static
=======
     * @param  (callable(TModel, TKey): mixed)|string|null  $key
     * @param  bool  $strict
     * @return static<int, TModel>
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    public function unique($key = null, $strict = false)
    {
        if (! is_null($key)) {
            return parent::unique($key, $strict);
        }

        return new static(array_values($this->getDictionary()));
    }

    /**
     * Returns only the models from the collection with the specified keys.
     *
<<<<<<< HEAD
     * @param  mixed  $keys
     * @return static
=======
     * @param  array<array-key, mixed>|null  $keys
     * @return static<int, TModel>
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    public function only($keys)
    {
        if (is_null($keys)) {
            return new static($this->items);
        }

        $dictionary = Arr::only($this->getDictionary(), $keys);

        return new static(array_values($dictionary));
    }

    /**
     * Returns all models in the collection except the models with specified keys.
     *
<<<<<<< HEAD
     * @param  mixed  $keys
     * @return static
=======
     * @param  array<array-key, mixed>|null  $keys
     * @return static<int, TModel>
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    public function except($keys)
    {
        $dictionary = Arr::except($this->getDictionary(), $keys);

        return new static(array_values($dictionary));
    }

    /**
     * Make the given, typically visible, attributes hidden across the entire collection.
     *
<<<<<<< HEAD
     * @param  array|string  $attributes
=======
     * @param  array<array-key, string>|string  $attributes
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * @return $this
     */
    public function makeHidden($attributes)
    {
        return $this->each->makeHidden($attributes);
    }

    /**
     * Make the given, typically hidden, attributes visible across the entire collection.
     *
<<<<<<< HEAD
     * @param  array|string  $attributes
=======
     * @param  array<array-key, string>|string  $attributes
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * @return $this
     */
    public function makeVisible($attributes)
    {
        return $this->each->makeVisible($attributes);
    }

    /**
     * Append an attribute across the entire collection.
     *
<<<<<<< HEAD
     * @param  array|string  $attributes
=======
     * @param  array<array-key, string>|string  $attributes
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * @return $this
     */
    public function append($attributes)
    {
        return $this->each->append($attributes);
    }

    /**
     * Get a dictionary keyed by primary keys.
     *
<<<<<<< HEAD
     * @param  \ArrayAccess|array|null  $items
     * @return array
=======
     * @param  iterable<array-key, TModel>|null  $items
     * @return array<array-key, TModel>
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    public function getDictionary($items = null)
    {
        $items = is_null($items) ? $this->items : $items;

        $dictionary = [];

        foreach ($items as $value) {
            $dictionary[$value->getKey()] = $value;
        }

        return $dictionary;
    }

    /**
     * The following methods are intercepted to always return base collections.
     */

    /**
     * Get an array with the values of a given key.
     *
<<<<<<< HEAD
     * @param  string|array  $value
     * @param  string|null  $key
     * @return \Illuminate\Support\Collection
=======
     * @param  string|array<array-key, string>  $value
     * @param  string|null  $key
     * @return \Illuminate\Support\Collection<int, mixed>
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    public function pluck($value, $key = null)
    {
        return $this->toBase()->pluck($value, $key);
    }

    /**
     * Get the keys of the collection items.
     *
<<<<<<< HEAD
     * @return \Illuminate\Support\Collection
=======
     * @return \Illuminate\Support\Collection<int, TKey>
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    public function keys()
    {
        return $this->toBase()->keys();
    }

    /**
     * Zip the collection together with one or more arrays.
     *
<<<<<<< HEAD
     * @param  mixed  ...$items
     * @return \Illuminate\Support\Collection
=======
     * @template TZipValue
     *
     * @param  \Illuminate\Contracts\Support\Arrayable<array-key, TZipValue>|iterable<array-key, TZipValue>  ...$items
     * @return \Illuminate\Support\Collection<int, \Illuminate\Support\Collection<int, TModel|TZipValue>>
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    public function zip($items)
    {
        return $this->toBase()->zip(...func_get_args());
    }

    /**
     * Collapse the collection of items into a single array.
     *
<<<<<<< HEAD
     * @return \Illuminate\Support\Collection
=======
     * @return \Illuminate\Support\Collection<int, mixed>
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    public function collapse()
    {
        return $this->toBase()->collapse();
    }

    /**
     * Get a flattened array of the items in the collection.
     *
     * @param  int  $depth
<<<<<<< HEAD
     * @return \Illuminate\Support\Collection
=======
     * @return \Illuminate\Support\Collection<int, mixed>
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    public function flatten($depth = INF)
    {
        return $this->toBase()->flatten($depth);
    }

    /**
     * Flip the items in the collection.
     *
<<<<<<< HEAD
     * @return \Illuminate\Support\Collection
=======
     * @return \Illuminate\Support\Collection<TModel, TKey>
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    public function flip()
    {
        return $this->toBase()->flip();
    }

    /**
     * Pad collection to the specified length with a value.
     *
<<<<<<< HEAD
     * @param  int  $size
     * @param  mixed  $value
     * @return \Illuminate\Support\Collection
=======
     * @template TPadValue
     *
     * @param  int  $size
     * @param  TPadValue  $value
     * @return \Illuminate\Support\Collection<int, TModel|TPadValue>
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    public function pad($size, $value)
    {
        return $this->toBase()->pad($size, $value);
    }

    /**
     * Get the comparison function to detect duplicates.
     *
     * @param  bool  $strict
<<<<<<< HEAD
     * @return \Closure
=======
     * @return callable(TValue, TValue): bool
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    protected function duplicateComparator($strict)
    {
        return function ($a, $b) {
            return $a->is($b);
        };
    }

    /**
     * Get the type of the entities being queued.
     *
     * @return string|null
     *
     * @throws \LogicException
     */
    public function getQueueableClass()
    {
        if ($this->isEmpty()) {
            return;
        }

<<<<<<< HEAD
        $class = get_class($this->first());

        $this->each(function ($model) use ($class) {
            if (get_class($model) !== $class) {
=======
        $class = $this->getQueueableModelClass($this->first());

        $this->each(function ($model) use ($class) {
            if ($this->getQueueableModelClass($model) !== $class) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
                throw new LogicException('Queueing collections with multiple model types is not supported.');
            }
        });

        return $class;
    }

    /**
<<<<<<< HEAD
     * Get the identifiers for all of the entities.
     *
     * @return array
=======
     * Get the queueable class name for the given model.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return string
     */
    protected function getQueueableModelClass($model)
    {
        return method_exists($model, 'getQueueableClassName')
                ? $model->getQueueableClassName()
                : get_class($model);
    }

    /**
     * Get the identifiers for all of the entities.
     *
     * @return array<int, mixed>
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    public function getQueueableIds()
    {
        if ($this->isEmpty()) {
            return [];
        }

        return $this->first() instanceof QueueableEntity
                    ? $this->map->getQueueableId()->all()
                    : $this->modelKeys();
    }

    /**
     * Get the relationships of the entities being queued.
     *
<<<<<<< HEAD
     * @return array
=======
     * @return array<int, string>
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    public function getQueueableRelations()
    {
        if ($this->isEmpty()) {
            return [];
        }

        $relations = $this->map->getQueueableRelations()->all();

        if (count($relations) === 0 || $relations === [[]]) {
            return [];
        } elseif (count($relations) === 1) {
            return reset($relations);
        } else {
            return array_intersect(...array_values($relations));
        }
    }

    /**
     * Get the connection of the entities being queued.
     *
     * @return string|null
     *
     * @throws \LogicException
     */
    public function getQueueableConnection()
    {
        if ($this->isEmpty()) {
            return;
        }

        $connection = $this->first()->getConnectionName();

        $this->each(function ($model) use ($connection) {
            if ($model->getConnectionName() !== $connection) {
                throw new LogicException('Queueing collections with multiple model connections is not supported.');
            }
        });

        return $connection;
    }

    /**
     * Get the Eloquent query builder from the collection.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     *
     * @throws \LogicException
     */
    public function toQuery()
    {
        $model = $this->first();

        if (! $model) {
            throw new LogicException('Unable to create query for empty collection.');
        }

        $class = get_class($model);

        if ($this->filter(function ($model) use ($class) {
            return ! $model instanceof $class;
        })->isNotEmpty()) {
            throw new LogicException('Unable to create query for collection with mixed types.');
        }

        return $model->newModelQuery()->whereKey($this->modelKeys());
    }
}
