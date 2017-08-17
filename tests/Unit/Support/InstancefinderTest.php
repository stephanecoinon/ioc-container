<?php

namespace Tests;

use StephaneCoinon\Container\Support\InstanceFinder;
use Tests\Stubs\NeedleForInstanceFinder;
use Tests\TestCase;

/**
 * @runTestsInSeparateProcesses
 */
class InstanceFinderTest extends TestCase
{
    /** @test */
    function it_can_find_the_first_instance_of_a_class_in_the_globals()
    {
        global $globalInstance;
        $globalInstance = new NeedleForInstanceFinder;

        $this->assertSame($globalInstance, InstanceFinder::first(NeedleForInstanceFinder::class));
    }

    /** @test */
    function it_returns_null_if_it_cannot_find_the_first_instance_of_a_class_in_the_globals()
    {
        $this->assertNull(InstanceFinder::first(NeedleForInstanceFinder::class));
    }
}
