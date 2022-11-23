<?php

namespace Illuminate\Database\Eloquent\Casts;

use Illuminate\Contracts\Database\Eloquent\Castable;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class AsArrayObject implements Castable
{
    /**
     * Get the caster class to use when casting from / to this cast target.
     *
     * @param  array  $arguments
     * @return object|string
     */
    public static function castUsing(array $arguments)
    {
        return new class implements CastsAttributes
        {
            public function get($model, $key, $value, $attributes)
            {
<<<<<<< HEAD
                return isset($attributes[$key]) ? new ArrayObject(json_decode($attributes[$key], true)) : null;
=======
                if (! isset($attributes[$key])) {
                    return;
                }

                $data = json_decode($attributes[$key], true);

                return is_array($data) ? new ArrayObject($data) : null;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            }

            public function set($model, $key, $value, $attributes)
            {
                return [$key => json_encode($value)];
            }

            public function serialize($model, string $key, $value, array $attributes)
            {
                return $value->getArrayCopy();
            }
        };
    }
}
