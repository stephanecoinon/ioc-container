<?php

namespace StephaneCoinon\Container\Frameworks\Slim;

use StephaneCoinon\Container\ContainerAdapter;

class SlimContainer extends ContainerAdapter
{
    /**
     * {@inheritDoc}
     */
    public function add($key, $value)
    {
        $this->container[$key] = $value;
    }

    /**
     * {@inheritDoc}
     */
    public function has($key)
    {
        return $this->container->has($key);
    }

    /**
     * {@inheritDoc}
     */
    public function get($key)
    {
        return $this->container->get($key);
    }
}
