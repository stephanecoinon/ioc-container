<?php

namespace StephaneCoinon\Container\Frameworks\Laravel;

use StephaneCoinon\Container\Frameworks\Framework;

class LaravelFramework extends Framework
{
    public $adapter = LaravelContainer::class;

    public function getContainer()
    {
        return app()->getInstance();
    }
}
