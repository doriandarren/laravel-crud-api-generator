<?php

/**
 * Process generator
 */

include __DIR__ . "/../vendor/autoload.php";




$tableSingular = "telepassElconSwitzerland";
$tablePlural = "telepassElconSwitzerlands";

$ob = new \stdClass();
$ob->name =  "company_id";
$ob->type =  "input";

$columns = [
    $ob
];

$relationClass = "LevelOne";
$relationType = "1";
$nameSpace = "Bounded";
$templateType = "3";



$generator = new \Infinito\LaravelCrudApiGenerator\Generator();
$generator->__invoke($tableSingular, $tablePlural, $columns, $relationClass, $relationType, $nameSpace, $templateType);

