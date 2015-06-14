<?php

$autoloader = require_once dirname(__FILE__) . '/../vendor/autoload.php';

if ($autoloader instanceof \Composer\Autoload\ClassLoader) {
    $autoloader->register();
    $autoloader->add('Dummy', 'tests');
}
