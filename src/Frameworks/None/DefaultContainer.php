<?php

namespace StephaneCoinon\Container\Frameworks\None;

use StephaneCoinon\Container\ContainerAdapter;

class DefaultContainer extends ContainerAdapter
{
    /**
     * {@inheritDoc}
     */
    public function add($key, $value)
    {
        $this->container->add($key, $value);
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
