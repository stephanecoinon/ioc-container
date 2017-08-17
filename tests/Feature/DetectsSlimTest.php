<?php

namespace Tests\Feature;

use StephaneCoinon\Container\FrameworkDetector;
use StephaneCoinon\Container\Frameworks\Slim\SlimFramework;
use Tests\Feature\TestsOtherFrameworksArentDetected;
use Tests\TestCase;

/**
 * @runTestsInSeparateProcesses
 */
class DetectsSlimTest extends TestCase
{
    use TestsOtherFrameworksArentDetected;

    public $framework = 'slim';

    /** @test */
    function it_detects_slim()
    {
        $this->assertInstanceOf(SlimFramework::class, FrameworkDetector::slim());
        $this->assertInstanceOf(SlimFramework::class, FrameworkDetector::detect());
    }
}
