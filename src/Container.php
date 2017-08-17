<?php

namespace StephaneCoinon\Container;

abstract class Container
{
    /** @var StephaneCoinon\Container\ContainerAdapter */
    protected static $adapter = null;

    /**
     * Boot container.
     *
     * By default the container is booted only if not already booted.
     *
     * @param  boolean $force if true, force boot even if already booted
     */
    public static function boot($force = false)
    {
        if ($force || ! static::isBooted()) {
            static::$adapter = FrameworkDetector::detect()->getContainerAdapter();
        }
    }

    public static function isBooted()
    {
        return ! is_null(static::$adapter);
    }

    /**
     * Get the container adapter.
     *
     * @return ContainerAdpater
     */
    public static function getAdapter()
    {
        return static::$adapter;
    }

    /**
     * Get the native container instance.
     *
     * @return mixed
     */
    public static function getInstance()
    {
        return static::getAdapter()->getInstance();
    }

    /**
     * Force container boot.
     */
    public static function forceBoot()
    {
        static::boot(true);
    }

    public static function destroy()
    {
        static::$adapter = null;
    }

    public static function add($key, $value)
    {
        return static::$adapter->add($key, $value);
    }

    /**
     * Resolve a key out of the container.
     *
     * If the key is an existing class path and it is not in the container,
     * then a new instance of this class will be returned.
     *
     * @param  string $key
     * @param  array $args arguments to pass when a new instance is resolved
     * @return mixed value or object associated to $key
     */
    public static function get($key, $args = [])
    {
        if (! static::has($key) && class_exists($key)) {
            static::add($key, $key);
        }

        return static::$adapter->get($key, $args);
    }

    public static function has($key)
    {
        return static::$adapter->has($key);
    }
}
