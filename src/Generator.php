<?php

namespace Infinito\LaravelCrudApiGenerator;


use Infinito\LaravelCrudApiGenerator\Repositories\ToApis\ToApiRepository;



class Generator
{


    /**
     * @param $tableSingular
     * @param $tablePlural
     * @param $columns
     * @param $relationClass
     * @param $relationType
     * @param $nameSpace
     * @param $templateType
     * @return void
     */
    public function __invoke($tableSingular, $tablePlural, $columns, $relationClass, $relationType, $nameSpace, $templateType)
    {

        (new ToApiRepository())->__invoke($tableSingular, $tablePlural, $columns, $relationClass, $relationType, $nameSpace, $templateType);

    }

}
