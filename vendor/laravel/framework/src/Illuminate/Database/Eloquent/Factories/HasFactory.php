<?php

namespace Illuminate\Database\Eloquent\Factories;

trait HasFactory
{
    /**
     * Get a new factory instance for the model.
     *
<<<<<<< HEAD
     * @param  mixed  $parameters
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public static function factory(...$parameters)
=======
     * @param  callable|array|int|null  $count
     * @param  callable|array  $state
     * @return \Illuminate\Database\Eloquent\Factories\Factory<static>
     */
    public static function factory($count = null, $state = [])
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    {
        $factory = static::newFactory() ?: Factory::factoryForModel(get_called_class());

        return $factory
<<<<<<< HEAD
                    ->count(is_numeric($parameters[0] ?? null) ? $parameters[0] : null)
                    ->state(is_array($parameters[0] ?? null) ? $parameters[0] : ($parameters[1] ?? []));
=======
                    ->count(is_numeric($count) ? $count : null)
                    ->state(is_callable($count) || is_array($count) ? $count : $state);
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
    }

    /**
     * Create a new factory instance for the model.
     *
<<<<<<< HEAD
     * @return \Illuminate\Database\Eloquent\Factories\Factory
=======
     * @return \Illuminate\Database\Eloquent\Factories\Factory<static>
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
     */
    protected static function newFactory()
    {
        //
    }
}
