<?php

namespace Tests\Unit\Framework;

use Tests\Stubs\FrameworkWithoutAdapter;
use Tests\TestCase;

class FrameworkTest extends TestCase
{
    /**
     * @test
     * @expectedException Exception
     */
    function it_throws_an_exception_if_container_adapter_class_is_not_defined()
    {
        $framework = new FrameworkWithoutAdapter;

        $framework->getContainerAdapter();
    }

    /**
     * @test
     * @expectedException Exception
     */
    function it_throws_an_exception_if_container_adapter_class_does_not_exist()
    {
        $framework = new FrameworkWithoutAdapter;
        $framework->adapter = 'DummyClass';

        $framework->getContainerAdapter();
    }

    /**
     * @test
     * @expectedException Exception
     */
    function it_throws_an_exception_if_container_adapter_class_does_not_extend_ContainerAdapter()
    {
        $framework = new FrameworkWithoutAdapter;
        $framework->adapter = '\stdClass';

        $framework->getContainerAdapter();
    }
}
