<?php

spl_autoload_register(static function ($class) {
    $namespace = 'palamaryuk\\FastExcelWriter\\';
    if (0 === strpos($class, $namespace)) {
        include __DIR__ . '/FastExcelWriter/' . str_replace($namespace, '', $class) . '.php';
    }
});

// EOF