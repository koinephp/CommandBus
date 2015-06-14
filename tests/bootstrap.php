<?php

$autoloader = require_once dirname(__FILE__) . '/../vendor/autoload.php';

if ($autoloader instanceof \Composer\Autoload\ClassLoader) {
    $autoloader->register();
    $autoloader->add('Dummy', 'tests');
} else {
    $dir = dirname(__FILE__) . '/Dummy/Command';
    requireRecursive($dir);
}

function requireRecursive($dir)
{
    foreach (scandir($dir) as $filename) {
        $path = $dir . '/' . $filename;
        if (is_file($path)) {
            require_once $path;
        }
    }
}
