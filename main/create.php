<?php


/**
 * Create Script
 */


include __DIR__ . "/../vendor/autoload.php";

$generator = new \Infinito\LaravelCrudApiGenerator\Scripts();
$generator->__invoke();


