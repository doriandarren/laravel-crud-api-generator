<?php

include __DIR__ . "/../vendor/autoload.php";


$generator = new \Infinito\LaravelCrudApiGenerator\Generator();
$generator->__invoke();

