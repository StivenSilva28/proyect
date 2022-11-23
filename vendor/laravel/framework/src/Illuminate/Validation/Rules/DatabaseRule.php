<?php

namespace Illuminate\Validation\Rules;

use Closure;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
=======
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Database\Eloquent\Model;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

trait DatabaseRule
{
    /**
     * The table to run the query against.
     *
     * @var string
     */
    protected $table;

    /**
     * The column to check on.
     *
     * @var string
     */
    protected $column;

    /**
     * The extra where clauses for the query.
     *
     * @var array
     */
    protected $wheres = [];

    /**
     * The array of custom query callbacks.
     *
     * @var array
     */
    protected $using = [];

    /**
     * Create a new rule instance.
     *
     * @param  string  $table
     * @param  string  $column
     * @return void
     */
    public function __construct($table, $column = 'NULL')
    {
        $this->column = $column;

        $this->table = $this->resolveTableName($table);
    }

    /**
     * Resolves the name of the table from the given string.
     *
     * @param  string  $table
     * @return string
     */
    public function resolveTableName($table)
    {
<<<<<<< HEAD
        if (! Str::contains($table, '\\') || ! class_exists($table)) {
=======
        if (! str_contains($table, '\\') || ! class_exists($table)) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            return $table;
        }

        if (is_subclass_of($table, Model::class)) {
            $model = new $table;

<<<<<<< HEAD
            if (Str::contains($model->getTable(), '.')) {
=======
            if (str_contains($model->getTable(), '.')) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
                return $table;
            }

            return implode('.', array_map(function (string $part) {
                return trim($part, '.');
            }, array_filter([$model->getConnectionName(), $model->getTable()])));
        }

        return $table;
    }

    /**
     * Set a "where" constraint on the query.
     *
     * @param  \Closure|string  $column
<<<<<<< HEAD
     * @param  array|string|int|null  $value
=======
     * @param  \Illuminate\Contracts\Support\Arrayable|array|string|int|null  $value
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * @return $this
     */
    public function where($column, $value = null)
    {
<<<<<<< HEAD
        if (is_array($value)) {
=======
        if ($value instanceof Arrayable || is_array($value)) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            return $this->whereIn($column, $value);
        }

        if ($column instanceof Closure) {
            return $this->using($column);
        }

        if (is_null($value)) {
            return $this->whereNull($column);
        }

        $this->wheres[] = compact('column', 'value');

        return $this;
    }

    /**
     * Set a "where not" constraint on the query.
     *
     * @param  string  $column
<<<<<<< HEAD
     * @param  array|string  $value
=======
     * @param  \Illuminate\Contracts\Support\Arrayable|array|string  $value
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * @return $this
     */
    public function whereNot($column, $value)
    {
<<<<<<< HEAD
        if (is_array($value)) {
=======
        if ($value instanceof Arrayable || is_array($value)) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            return $this->whereNotIn($column, $value);
        }

        return $this->where($column, '!'.$value);
    }

    /**
     * Set a "where null" constraint on the query.
     *
     * @param  string  $column
     * @return $this
     */
    public function whereNull($column)
    {
        return $this->where($column, 'NULL');
    }

    /**
     * Set a "where not null" constraint on the query.
     *
     * @param  string  $column
     * @return $this
     */
    public function whereNotNull($column)
    {
        return $this->where($column, 'NOT_NULL');
    }

    /**
     * Set a "where in" constraint on the query.
     *
     * @param  string  $column
<<<<<<< HEAD
     * @param  array  $values
     * @return $this
     */
    public function whereIn($column, array $values)
=======
     * @param  \Illuminate\Contracts\Support\Arrayable|array  $values
     * @return $this
     */
    public function whereIn($column, $values)
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->where(function ($query) use ($column, $values) {
            $query->whereIn($column, $values);
        });
    }

    /**
     * Set a "where not in" constraint on the query.
     *
     * @param  string  $column
<<<<<<< HEAD
     * @param  array  $values
     * @return $this
     */
    public function whereNotIn($column, array $values)
=======
     * @param  \Illuminate\Contracts\Support\Arrayable|array  $values
     * @return $this
     */
    public function whereNotIn($column, $values)
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        return $this->where(function ($query) use ($column, $values) {
            $query->whereNotIn($column, $values);
        });
    }

    /**
<<<<<<< HEAD
=======
     * Ignore soft deleted models during the existence check.
     *
     * @param  string  $deletedAtColumn
     * @return $this
     */
    public function withoutTrashed($deletedAtColumn = 'deleted_at')
    {
        $this->whereNull($deletedAtColumn);

        return $this;
    }

    /**
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     * Register a custom query callback.
     *
     * @param  \Closure  $callback
     * @return $this
     */
    public function using(Closure $callback)
    {
        $this->using[] = $callback;

        return $this;
    }

    /**
     * Get the custom query callbacks for the rule.
     *
     * @return array
     */
    public function queryCallbacks()
    {
        return $this->using;
    }

    /**
     * Format the where clauses.
     *
     * @return string
     */
    protected function formatWheres()
    {
        return collect($this->wheres)->map(function ($where) {
            return $where['column'].','.'"'.str_replace('"', '""', $where['value']).'"';
        })->implode(',');
    }
}
