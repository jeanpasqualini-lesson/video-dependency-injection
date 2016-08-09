<?php

spl_autoload_register(function($class) {
    // Directory separator / = linux, \ = windows
    $ds = DIRECTORY_SEPARATOR;

    // Gets path filename class php
    $filename = __DIR__ . $ds . str_replace('\\', $ds, $class) . '.php';

    // If file exists then require else throw error
    if(file_exists($filename)) {
        require_once $filename;
    } else {
        throw new Exception('the class ' . $class . ' do not exist');
    }
});