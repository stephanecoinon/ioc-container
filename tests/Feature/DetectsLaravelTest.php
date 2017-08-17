<?php

namespace Tests\Feature;

use StephaneCoinon\Container\FrameworkDetector;
use StephaneCoinon\Container\Frameworks\Laravel\LaravelFramework;
use Tests\Feature\TestsOtherFrameworksArentDetected;
use Tests\TestCase;

/**
 * @runTestsInSeparateProcesses
 */
class DetectsLaravelTest extends TestCase
{
    use TestsOtherFrameworksArentDetected;

    public $framework = 'laravel';

    /** @test */
    function it_detects_laravel()
    {
        $this->assertInstanceOf(LaravelFramework::class, FrameworkDetector::laravel());
        $this->assertInstanceOf(LaravelFramework::class, FrameworkDetector::detect());
    }
}
