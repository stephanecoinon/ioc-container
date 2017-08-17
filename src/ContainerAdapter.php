<?php

namespace StephaneCoinon\Container;

abstract class ContainerAdapter
{
    /** @var mixed Framework container */
    protected $container;

    /**
     * Make a new ContainerAdapter to a framework container.
     *
     * @param mixed $container
     */
    public function __construct($container)
    {
        $this->container = $container;
    }

    /**
     * Get the container used in the framwork.
     *
     * @return mixed
     */
    public function getInstance()
    {
        return $this->container;
    }

    /**
     * Register a binding with the container.
     *
     * @param string  $key
     * @param mixed   $value
     */
    public abstract function add($key, $value);

    /**
     * Resolve a key out of the container.
     *
     * @param  string  $key
     * @return mixed   value or object associated to $key
     */
    public abstract function get($key);

    /**
     * Determine if the given $key has been bound.
     *
     * @param  string   $key
     * @return boolean
     */
    public abstract function has($key);
}
