<?php

// In a real Laravel app, helpers are auto-loaded via composer so for testing
// purposes, we'll require them here instead
require __DIR__.'/../Illuminate/Foundation/helpers.php';

// Turn the lights on
return new Illuminate\Foundation\Application;
