<?php

// Anonymous functions.
$message = 'bergen and PHP';
$log = function () use ($message) {
    $message = ucfirst($message);
    echo $message . PHP_EOL;
};

$log();
$message = 'bergen and Python';
$log();

// Arrow functions - PHP 7.4
$message = 'bergen and PHP 8.5';
$log = fn ($message) => ucfirst($message);
echo $log($message) . PHP_EOL;

// First Class Callable (FCC) - PHP 8.1
$message = 'bergen and PHP 8.6';
$log = ucfirst(...);
echo $log($message) . PHP_EOL;
