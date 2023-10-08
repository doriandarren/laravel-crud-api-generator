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
     * @param $list_ck
     * @param $show_ck
     * @param $store_ck
     * @param $update_ck
     * @param $destroy_ck
     * @param $model_ck
     * @param $repository_ck
     * @param $route_ck
     * @param $migration_ck
     * @param $seeder_ck
     * @param $factory_ck
     * @param $testunit_ck
     * @return void
     */
    public function __invoke($tableSingular, $tablePlural, $columns, $relationClass, $relationType, $nameSpace,
                             $templateType, $list_ck, $show_ck, $store_ck, $update_ck, $destroy_ck, $model_ck,
                             $repository_ck, $route_ck, $migration_ck, $seeder_ck, $factory_ck, $testunit_ck)
    {

        (new ToApiRepository())->__invoke($tableSingular, $tablePlural, $columns, $relationClass, $relationType,
                                            $nameSpace, $templateType, $list_ck, $show_ck, $store_ck, $update_ck,
                                            $destroy_ck, $model_ck, $repository_ck, $route_ck, $migration_ck,
                                            $seeder_ck, $factory_ck, $testunit_ck);

    }

}
