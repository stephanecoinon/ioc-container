<?php

namespace StephaneCoinon\Container\Support;

class InstanceFinder
{
    /**
     * Returns the first instance of $class found in the global namespace.
     *
     * @param  string  $class
     * @return mixed|null  null if no instance of $class found
     */
    public static function first($class)
    {
        foreach ($GLOBALS as $value) {
            if (is_a($value, $class)) {
                return $value;
            }
        }

        return null;
    }
}
