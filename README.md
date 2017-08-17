# Polymorphic IoC Container for PHP

Versatile IoC container package that wraps around the container of the framework it's pulled in.

When this package is pulled in a framework (ie Laravel, Symfony...), it automatically detects it and wraps around the native IoC container of the framework.

When used in a vanilla PHP context, this package uses the [PHP League container](http://container.thephpleague.com).

This is useful when developping an agnostic package that needs an IoC container but also ships with service providers for popular frameworks. It gives you a common IoC container API that leverages the framework native IoC container without your package ever pulling the framework itself.

Frameworks currently supported are:
- Laravel

## Requirements

- PHP 7

## Installation

```
composer require stephanecoinon/ioc-container
```

## Usage

```php
<?php

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

// Container instantiates a new instance if the key is an existing class that's
// not in the container yet
$object = Container::get('\My\Super\DuperClass');

// Get the native container instance
$nativeContainer = Container::getInstance();
```

## License

This package is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
