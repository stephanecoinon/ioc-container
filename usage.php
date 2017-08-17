<?php

namespace My\Super {
    class DuperClass {

    }
}

namespace {

use StephaneCoinon\Container\Container;

require 'vendor/autoload.php';

// Boot the container
// You should add this line in your bootstrap or application service provider
Container::boot();

// Store a key/value into the container
Container::add('foo', 'bar');

// Resolve a key out of the container
$bar = Container::get('foo');

// Check whether a key is stored in the container
if (Container::has('foo')) {
    echo 'Foo is in the container';
}

// Container instantiates a new instance if key is an existing class that's
// not in the container yet
$object = Container::get('\My\Super\DuperClass');

// Get the native container instance
$nativeContainer = Container::getInstance();

}
