<?php

namespace Tests;

use League\Container\Container as LeagueContainer;
use StephaneCoinon\Container\Frameworks\None\NoFramework;
use Tests\TestCase;

class NoFrameworkTest extends TestCase
{
    public $framework = 'none';

    /** @test */
    function it_uses_the_php_league_container()
    {
        $framework = new NoFramework;

        $this->assertInstanceOf(LeagueContainer::class, $framework->getContainer());
    }
}
