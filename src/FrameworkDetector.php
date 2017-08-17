<?php

namespace StephaneCoinon\Container;

use StephaneCoinon\Container\Frameworks\Laravel\LaravelFramework;
use StephaneCoinon\Container\Frameworks\None\NoFramework;
use StephaneCoinon\Container\Frameworks\Slim\SlimFramework;
use StephaneCoinon\Container\Support\InstanceFinder;

class FrameworkDetector
{
    public static function detect()
    {
        // Try to detect all frameworks supported
        foreach (static::getSupported() as $framework) {
            $detected = static::$framework();
            if ($detected) {
                return $detected;
            }
        }

        // Return "none" if no supported framework found
        return new NoFramework;
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

    public static function slim()
    {
        $app = SlimFramework::resolveApp();

        if ($app) {
            return new SlimFramework($app);
        }
    }

    /**
     * Get the list of supported frameworks.
     *
     * @return array list of lower-case framework names
     */
    public static function getSupported()
    {
        // Fetch all frameworks supported
        $frameworksPath = __DIR__.'/Frameworks';
        $frameworks = array_map(function ($path) use ($frameworksPath) {
            return strtolower(ltrim($path, $frameworksPath));
        }, glob("$frameworksPath/*", GLOB_ONLYDIR));

        // Return list except "none"
        return array_values(array_diff($frameworks, ['none']));
    }
}
