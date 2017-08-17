<?php

namespace Tests;

use Illuminate\Container\Container as IlluminateContainer;
use StephaneCoinon\Container\Frameworks\Laravel\LaravelContainer;
use Tests\TestCase;

class LaravelContainerTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->container = new LaravelContainer(new IlluminateContainer);
    }

    /** @test */
    function add()
    {
        $this->container->add('foo', 'bar');

        $this->assertEquals('bar', $this->container->getInstance()->make('foo'));
    }

    /** @test */
    function has()
    {
        $this->container->add('foo', 'bar');

        $this->assertTrue($this->container->has('foo'));
        $this->assertFalse($this->container->has('baz'));
    }

    /** @test */
    function get()
    {
        $this->container->add('foo', 'bar');

        $this->assertEquals('bar', $this->container->get('foo'));
    }
}
