<?php

namespace Tests\Stubs;

use StephaneCoinon\Container\Frameworks\Framework;

class FrameworkWithoutAdapter extends Framework
{
    public function getContainer()
    {
    }
}
