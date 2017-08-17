<?php

namespace Tests\Unit\Frameworks\Slim;

use Slim\Container as SlimContainer;
use StephaneCoinon\Container\Frameworks\Slim\SlimFramework;
use Tests\TestCase;

/**
 * @runTestsInSeparateProcesses
 */
class SlimFrameworkTest extends TestCase
{
    public $framework = 'slim';

    /** @test */
    function it_uses_the_slim_container()
    {
        $framework = new SlimFramework;

        $this->assertInstanceOf(SlimContainer::class, $framework->getContainer());
    }
}
