<?php

namespace Illuminate\Support\Facades;

/**
<<<<<<< HEAD
 * @method static \Illuminate\Contracts\Validation\Validator make(array $data, array $rules, array $messages = [], array $customAttributes = [])
=======
 * @method static \Illuminate\Contracts\Validation\Validator|\Illuminate\Validation\Validator make(array $data, array $rules, array $messages = [], array $customAttributes = [])
 * @method static void includeUnvalidatedArrayKeys()
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
 * @method static void excludeUnvalidatedArrayKeys()
 * @method static void extend(string $rule, \Closure|string $extension, string $message = null)
 * @method static void extendImplicit(string $rule, \Closure|string $extension, string $message = null)
 * @method static void replacer(string $rule, \Closure|string $replacer)
 * @method static array validate(array $data, array $rules, array $messages = [], array $customAttributes = [])
 *
 * @see \Illuminate\Validation\Factory
 */
class Validator extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'validator';
    }
}
