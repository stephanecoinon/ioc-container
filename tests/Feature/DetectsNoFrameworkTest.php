<?php

namespace Tests\Feature;

use StephaneCoinon\Container\FrameworkDetector;
use StephaneCoinon\Container\Frameworks\None\NoFramework;
use Tests\Feature\TestsOtherFrameworksArentDetected;
use Tests\TestCase;

/**
 * @runTestsInSeparateProcesses
 */
class DetectsNoFrameworkTest extends TestCase
{
    use TestsOtherFrameworksArentDetected;

    public $framework = 'none';

    /** @test */
    function it_detects_vanilla_php()
    {
        $this->assertInstanceOf(NoFramework::class, FrameworkDetector::detect());
    }
}
