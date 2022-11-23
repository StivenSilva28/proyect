<?php

namespace Illuminate\View;

class ViewName
{
    /**
     * Normalize the given view name.
     *
     * @param  string  $name
     * @return string
     */
    public static function normalize($name)
    {
        $delimiter = ViewFinderInterface::HINT_PATH_DELIMITER;

<<<<<<< HEAD
        if (strpos($name, $delimiter) === false) {
=======
        if (! str_contains($name, $delimiter)) {
>>>>>>> 6d8029f69a7308fd09612681e8872548053ebad2
            return str_replace('/', '.', $name);
        }

        [$namespace, $name] = explode($delimiter, $name);

        return $namespace.$delimiter.str_replace('/', '.', $name);
    }
}
