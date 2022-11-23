<?php

namespace Illuminate\Database\Eloquent\Relations\Concerns;

use BackedEnum;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
<<<<<<< HEAD
=======
use UnitEnum;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2

trait InteractsWithDictionary
{
    /**
     * Get a dictionary key attribute - casting it to a string if necessary.
     *
     * @param  mixed  $attribute
     * @return mixed
     *
     * @throws \Doctrine\Instantiator\Exception\InvalidArgumentException
     */
    protected function getDictionaryKey($attribute)
    {
        if (is_object($attribute)) {
            if (method_exists($attribute, '__toString')) {
                return $attribute->__toString();
            }

            if (function_exists('enum_exists') &&
<<<<<<< HEAD
                $attribute instanceof BackedEnum) {
                return $attribute->value;
=======
                $attribute instanceof UnitEnum) {
                return $attribute instanceof BackedEnum ? $attribute->value : $attribute->name;
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            }

            throw new InvalidArgumentException('Model attribute value is an object but does not have a __toString method.');
        }

        return $attribute;
    }
}
