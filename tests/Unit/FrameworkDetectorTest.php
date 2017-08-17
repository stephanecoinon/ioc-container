<?php

namespace Tests\Unit;

use StephaneCoinon\Container\FrameworkDetector;
use Tests\TestCase;

class FrameworkDetectorTest extends TestCase
{
    /** @test */
    function it_lists_supported_frameworks()
    {
        $this->assertEquals(
            ['laravel', 'slim'],
            FrameworkDetector::getSupported()
        );
    }
}
