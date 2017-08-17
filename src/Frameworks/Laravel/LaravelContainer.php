<?php

namespace StephaneCoinon\Container\Frameworks\Laravel;

use StephaneCoinon\Container\ContainerAdapter;

class LaravelContainer extends ContainerAdapter
{
    /**
     * {@inheritDoc}
     */
    public function add($key, $value)
    {
        $this->container->bind($key, $value);
    }

    /**
     * {@inheritDoc}
     */
    public function has($key)
    {
        return $this->container->bound($key);
    }

    /**
     * {@inheritDoc}
     */
    public function get($key)
    {
        return $this->container->make($key);
    }
}
