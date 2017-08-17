<?php

namespace StephaneCoinon\Container;

use StephaneCoinon\Container\Frameworks\Laravel\LaravelFramework;
use StephaneCoinon\Container\Frameworks\None\NoFramework;

class FrameworkDetector
{
    public static function detect()
    {
        return static::laravel() ?? new NoFramework;
    }

    public static function none()
    {
        $framework = static::detect();

        if ($framework instanceof NoFramework) {
            return $framework;
        }
    }

    public static function laravel()
    {
        if (function_exists('app') && get_class(app()) == \Illuminate\Foundation\Application::class) {
            return new LaravelFramework;
        }
    }
}
