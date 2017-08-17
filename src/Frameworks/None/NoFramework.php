<?php

namespace StephaneCoinon\Container\Frameworks\None;

use League\Container\Container as LeagueContainer;
use StephaneCoinon\Container\Frameworks\Framework;
use StephaneCoinon\Container\Frameworks\None\DefaultContainer;

class NoFramework extends Framework
{
    public $adapter = DefaultContainer::class;

    public function getContainer()
    {
        return new LeagueContainer;
    }
}
