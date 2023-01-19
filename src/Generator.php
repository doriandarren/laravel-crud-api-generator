<?php

namespace Infinito\LaravelCrudApiGenerator;


use Infinito\LaravelCrudApiGenerator\Repositories\ToApis\ToApiRepository;



class Generator
{

    public function __invoke()
    {

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
        

        (new ToApiRepository())->__invoke($tableSingular, $tablePlural, $columns, $relationClass, $relationType, $nameSpace, $templateType);

    }

}
