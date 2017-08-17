<?php

namespace Tests\Feature;

use Exception;
use StephaneCoinon\Container\FrameworkDetector;

trait TestsOtherFrameworksArentDetected
{
    public $frameworks = [
        'none',
        'laravel',
    ];

    /** @test */
    function other_frameworks_arent_detected()
    {
        // Ensure $framework is defined on the test case
        if (! isset($this->framework) || ! $this->framework) {
            throw new Exception('Please set the framework in your test case');
        }

        // Ensure framework detector methods for all other frameworks return null
        $others = array_diff($this->frameworks, [$this->framework]);
        foreach ($others as $framework) {
            $this->assertNull(
                FrameworkDetector::$framework(),
                $framework == 'none'
                    ? "Didn't detect a framework although \"{$this->framework}\" is loaded"
                    : "Detected \"$framework\" framework but \"{$this->framework}\" was expected"
            );
        }
    }
}
