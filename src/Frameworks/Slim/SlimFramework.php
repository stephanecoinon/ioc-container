<?php

namespace StephaneCoinon\Container\Frameworks\Slim;

use StephaneCoinon\Container\Frameworks\Framework;
use StephaneCoinon\Container\Support\InstanceFinder;

class SlimFramework extends Framework
{
    public $adapter = SlimContainer::class;

    /** @var Slim\App */
    protected $app;

    /**
     * Make a new SlimFramework instance.
     *
     * @param Slim\App|null $app
     */
    public function __construct(\Slim\App $app = null)
    {
        $this->app = $app ?? static::resolveApp();
    }

    /**
     * Resolve Slim App instance.
     *
     * Slim does not expose a static/global way to obtain the App instance but
     * since it should be instantiated in index.php (which is typically not
     * namespaced), we should find it in the globals.
     *
     * @return \Slim\App|null  null if not found
     */
    public static function resolveApp()
    {
        return InstanceFinder::first(\Slim\App::class);
    }

    public function getContainer()
    {
        return $this->app->getContainer();
    }
}
