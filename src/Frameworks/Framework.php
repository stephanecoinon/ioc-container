<?php

namespace StephaneCoinon\Container\Frameworks;

use Exception;
use StephaneCoinon\Container\ContainerAdapter;

abstract class Framework
{
    /**
     * Get framework container instance.
     *
     * @return mixed
     */
    public abstract function getContainer();

    /**
     * Get container adapter.
     *
     * @return ContainerAdapter
     */
    public function getContainerAdapter()
    {
        if (! isset($this->adapter)) {
            throw new Exception('Adapter not defined');
        }

        if (! class_exists($this->adapter)) {
            throw new Exception("Adapter \"{$this->adapter}\" class does not exist");
        }

        $adapterClass = $this->adapter;
        $adapter = new $adapterClass($this->getContainer());

        if (! is_subclass_of($adapter, ContainerAdapter::class)) {
            throw new Exception("Adapter \"{$this->adapter}\" class does not extend ContainerAdapter");
        }

        return $adapter;
    }
}
