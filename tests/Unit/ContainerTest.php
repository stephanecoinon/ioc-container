<?php

namespace Tests;

use League\Container\Exception\NotFoundException;
use StephaneCoinon\Container\Container;

class ContainerTest extends \PHPUnit\Framework\TestCase
{
    public function setUp()
    {
        Container::destroy();
    }

    /** @test */
    function it_can_only_be_booted_once_by_default()
    {
        $this->assertFalse(Container::isBooted());
        Container::boot();
        $container = Container::getAdapter();

        Container::boot();

        $this->assertSame($container, Container::getAdapter());
    }

    /** @test */
    function it_can_be_destroyed()
    {
        Container::boot();
        $this->assertTrue(Container::isBooted());

        Container::destroy();

        $this->assertFalse(Container::isBooted());
    }

    /** @test */
    function boot_can_be_forced()
    {
        Container::boot();
        Container::add('foo', 'bar');
        $this->assertEquals('bar', Container::get('foo'));

        Container::forceBoot();

        try {
            $resolved = Container::get('foo');
        } catch (NotFoundException $e) {
            $this->assertEquals('Alias (foo) is not being managed by the container', $e->getMessage());
            return;
        }

        $this->fail('No exception was thrown even though the container is empty');
    }

    /** @test */
    function resolving_an_existing_class_returns_a_new_instance_when_not_already_in_the_container()
    {
        Container::boot();
        $instance1 = Container::get(\stdClass::class);
        $instance2 = Container::get(\stdClass::class);

        $this->assertInstanceOf(\stdClass::class, $instance1);
        $this->assertInstanceOf(\stdClass::class, $instance2);
        $this->assertNotSame($instance1, $instance2);
    }
}
