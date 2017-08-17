<?php

namespace Tests\Unit;

use StephaneCoinon\Container\Frameworks\Laravel\LaravelFramework;
use Tests\TestCase;

class LaravelFrameworkTest extends TestCase
{
    public $framework = 'laravel';

    /** @test */
    function it_gets_the_laravel_container()
    {
        $laravel = new LaravelFramework;

        $container = $laravel->getContainer();

        $this->assertInstanceOf(\Illuminate\Container\Container::class, $container);
    }
}
