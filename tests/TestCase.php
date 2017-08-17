<?php

namespace Tests;

use PHPUnit\Framework\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    public function bootstrap($path)
    {
        require __DIR__.'/Stubs/'.$path;
    }

    public function setUp()
    {
        parent::setUp();

        if (isset($this->framework)) {
            $bootstrap = 'bootstrap'.ucfirst($this->framework);
            $this->$bootstrap();
        }
    }

    public function bootstrapNone()
    {
        // no op
    }

    public function bootstrapLaravel()
    {
        $this->bootstrap('Laravel/bootstrap/app.php');
    }

    /**
     * Instantiate a new Slim app.
     *
     * Test cases for Slim framework must bear the annotation
     * @runTestsInSeparateProcesses because of the use of globals.
     */
    public function bootstrapSlim()
    {
        global $slimApp;

        $slimApp = new \Slim\App;
    }
}
