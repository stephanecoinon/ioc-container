<?php

namespace Tests;

use League\Container\Container as LeagueContainer;
use StephaneCoinon\Container\Frameworks\None\DefaultContainer;
use Tests\TestCase;

class DefaultContainerTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->container = new DefaultContainer(new LeagueContainer);
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
