<?php

namespace Tests\Unit\Frameworks\Slim;

use Slim\Container as SlimNativeContainer;
use StephaneCoinon\Container\Frameworks\Slim\SlimContainer;
use Tests\TestCase;

class SlimContainerTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->container = new SlimContainer(new SlimNativeContainer);
    }

    /** @test */
    function add()
    {
        $this->container->add('foo', 'bar');

        $this->assertEquals('bar', $this->container->getInstance()->get('foo'));
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
