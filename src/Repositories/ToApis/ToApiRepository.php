<?php

namespace Infinito\LaravelCrudApiGenerator\Repositories\ToApis;

use Infinito\LaravelCrudApiGenerator\Repositories\ToApis\Helpers\GenerateToApiDestroyController;
use Infinito\LaravelCrudApiGenerator\Repositories\ToApis\Helpers\GenerateToApiFactory;
use Infinito\LaravelCrudApiGenerator\Repositories\ToApis\Helpers\GenerateToApiListController;
use Infinito\LaravelCrudApiGenerator\Repositories\ToApis\Helpers\GenerateToApiListPaginateController;
use Infinito\LaravelCrudApiGenerator\Repositories\ToApis\Helpers\GenerateToApiMigration;
use Infinito\LaravelCrudApiGenerator\Repositories\ToApis\Helpers\GenerateToApiModel;
use Infinito\LaravelCrudApiGenerator\Repositories\ToApis\Helpers\GenerateToApiPostman;
use Infinito\LaravelCrudApiGenerator\Repositories\ToApis\Helpers\GenerateToApiRepository;
use Infinito\LaravelCrudApiGenerator\Repositories\ToApis\Helpers\GenerateToApiRoute;
use Infinito\LaravelCrudApiGenerator\Repositories\ToApis\Helpers\GenerateToApiScript;
use Infinito\LaravelCrudApiGenerator\Repositories\ToApis\Helpers\GenerateToApiSeeder;
use Infinito\LaravelCrudApiGenerator\Repositories\ToApis\Helpers\GenerateToApiShowController;
use Infinito\LaravelCrudApiGenerator\Repositories\ToApis\Helpers\GenerateToApiStoreController;
use Infinito\LaravelCrudApiGenerator\Repositories\ToApis\Helpers\GenerateToApiUpdateController;

class ToApiRepository
{


    public function __invoke($tableSingular, $tablePlural, $columns, $relationClass, $relationType, $nameSpace,
                             $templateType, $list_ck, $show_ck, $store_ck, $update_ck, $destroy_ck, $model_ck,
                             $repository_ck, $route_ck, $migration_ck, $seeder_ck, $factory_ck, $testunit_ck)
    {


        $classNameSingularUp = ucwords($tableSingular);
        $classNamePluralUp = ucwords($tablePlural);
        $nameSpace = str_replace("/", '\\', $nameSpace);
        $response = '';



        /***************
         * Convert to
         * example_class
         **************/
        $arr = preg_split('/(?=[A-Z])/', $tableSingular);
        $tableNameWithGuion = '';
        for ($i = 0; $i < count($arr); $i++) {
            if ($i == 0) {
                $tableNameWithGuion = $arr[0];
            } else {
                $tableNameWithGuion .= '_' . strtolower($arr[$i]);
            }
        }

        $arr = preg_split('/(?=[A-Z])/', $tablePlural);
        $tableNameWithGuionPlural = '';
        for ($i = 0; $i < count($arr); $i++) {
            if ($i == 0) {
                $tableNameWithGuionPlural = $arr[0];
            } else {
                $tableNameWithGuionPlural .= '_' . strtolower($arr[$i]);
            }
        }




        /***************
         * PATH's
         **************/
        $dir = dirname(__FILE__,7);
        $pathController = $dir . "/" . "app/Http/Controllers/" . $nameSpace . '/' . $classNamePluralUp;
        $pathModel = $dir . "/" . "app/Models/" . $classNamePluralUp;
        $pathRepository = $dir . "/" . "app/Repositories/" . $classNamePluralUp;
        $pathRoute = $dir . "/" . "routes";
        $pathMigration = $dir . "/" . "database/migrations";
        $pathScript = $dir . "/" . "public/SCRIPT_GENERATOR";
        $pathSeeder = $dir . "/" . "database/seeders";
        $pathFactory = $dir . "/" . "database/factories";







        /***************
         * CONTROLLERS
         **************/

        // List
        if($list_ck){
            $fileBackEnd = new GenerateToApiListController();
            $okBackEnd = $fileBackEnd->__invoke($tableSingular, $tablePlural, $columns, $nameSpace, $templateType,
                $classNameSingularUp, $classNamePluralUp, $tableNameWithGuion,
                $tableNameWithGuionPlural, $relationClass, $relationType, $pathController);
            if($okBackEnd){
                $response = "<br> Ready module API List <br>";
            }
        }



        // List Paginate
//        $fileBackEnd = new GenerateToApiListPaginateController();
//        $okBackEnd = $fileBackEnd->__invoke($tableSingular, $tablePlural, $columns, $nameSpace, $templateType,
//            $classNameSingularUp, $classNamePluralUp, $tableNameWithGuion,
//            $tableNameWithGuionPlural, $relationClass, $relationType, $pathController);
//        if($okBackEnd){
//            $response .= "Ready module API list Paginate <br>";
//        }



        // Show
        if($show_ck){
            $fileBackEnd = new GenerateToApiShowController();
            $okBackEnd = $fileBackEnd->__invoke($tableSingular, $tablePlural, $columns, $nameSpace, $templateType,
                $classNameSingularUp, $classNamePluralUp, $tableNameWithGuion,
                $tableNameWithGuionPlural, $relationClass, $relationType, $pathController);
            if($okBackEnd){
                $response .= "Ready module API Show <br>";
            }
        }





        // Store
        if($store_ck){
            $fileBackEnd = new GenerateToApiStoreController();
            $okBackEnd = $fileBackEnd->__invoke($tableSingular, $tablePlural, $columns, $nameSpace, $templateType,
                $classNameSingularUp, $classNamePluralUp, $tableNameWithGuion,
                $tableNameWithGuionPlural, $relationClass, $relationType, $pathController);
            if($okBackEnd){
                $response .= "Ready module API Store <br>";
            }
        }



        // Update
        if($update_ck){
            $fileBackEnd = new GenerateToApiUpdateController();
            $okBackEnd = $fileBackEnd->__invoke($tableSingular, $tablePlural, $columns, $nameSpace, $templateType,
                $classNameSingularUp, $classNamePluralUp, $tableNameWithGuion,
                $tableNameWithGuionPlural, $relationClass, $relationType, $pathController);
            if($okBackEnd){
                $response .= "Ready module API Update <br>";
            }
        }




        // Destroy
        if($destroy_ck){
            $fileBackEnd = new GenerateToApiDestroyController();
            $okBackEnd = $fileBackEnd->__invoke($tableSingular, $tablePlural, $columns, $nameSpace, $templateType,
                $classNameSingularUp, $classNamePluralUp, $tableNameWithGuion,
                $tableNameWithGuionPlural, $relationClass, $relationType, $pathController);
            if($okBackEnd){
                $response .= "Ready module API Destroy <br>";
            }
        }





        /****************
         * MODEL
         ****************/

        if($model_ck){
            $fileModel = new GenerateToApiModel();
            $okRepository = $fileModel->__invoke($tableSingular, $tablePlural, $columns, $nameSpace, $templateType,
                $classNameSingularUp, $classNamePluralUp, $tableNameWithGuion,
                $tableNameWithGuionPlural, $relationClass, $relationType, $pathModel);
            if($okRepository){
                $response .= "Ready module Model <br>";
            }
        }






        /****************
         * REPOSITORY
         ****************/
        if($repository_ck){
            $fileRepository = new GenerateToApiRepository();
            $okRepository = $fileRepository->__invoke($tableSingular, $tablePlural, $columns, $nameSpace, $templateType, $pathRepository);
            if($okRepository){
                $response .= "Ready module Repository <br>";
            }
        }




        /****************
         * ROUTES
         ****************/
        if($route_ck){
            $fileBackEnd = new GenerateToApiRoute();
            $okBackEnd = $fileBackEnd->__invoke($tableSingular, $tablePlural, $columns, $nameSpace, $templateType,
                $classNameSingularUp, $classNamePluralUp, $tableNameWithGuion,
                $tableNameWithGuionPlural, $relationClass, $relationType, $pathRoute);
            if($okBackEnd){
                $response .= "Ready module API Back <br>";
            }
        }



        /****************
         * MIGRATION
         ****************/
        if($migration_ck){
            $fileBackEnd = new GenerateToApiMigration();
            $okBackEnd = $fileBackEnd->__invoke($tableSingular, $tablePlural, $columns, $nameSpace, $templateType,
                $classNameSingularUp, $classNamePluralUp, $tableNameWithGuion,
                $tableNameWithGuionPlural, $relationClass, $relationType, $pathMigration);
            if($okBackEnd){
                $response .= "Ready module API Back <br>";
            }
        }




        /****************
         * SCRIPT TXT
         ****************/
        $fileBackEnd = new GenerateToApiScript();
        $okBackEnd = $fileBackEnd->__invoke($tableSingular, $tablePlural, $columns, $nameSpace, $templateType,
            $classNameSingularUp, $classNamePluralUp, $tableNameWithGuion,
            $tableNameWithGuionPlural, $relationClass, $relationType, $pathScript);
        if($okBackEnd){
            $response .= "Ready module API Script <br>";
        }



        /****************
         * Export Collection Postman
         ****************/
        $fileBackEnd = new GenerateToApiPostman();
        $okBackEnd = $fileBackEnd->__invoke($tableSingular, $tablePlural, $columns, $nameSpace, $templateType,
            $classNameSingularUp, $classNamePluralUp, $tableNameWithGuion,
            $tableNameWithGuionPlural, $relationClass, $relationType, $pathScript);
        if($okBackEnd){
            $response .= "Ready module API Postman <br>";
        }


        /****************
         * Seeder
         ****************/
        if($seeder_ck){
            $fileBackEnd = new GenerateToApiSeeder();
            $okBackEnd = $fileBackEnd->__invoke($tableSingular, $tablePlural, $columns, $nameSpace, $templateType,
                $classNameSingularUp, $classNamePluralUp, $tableNameWithGuion,
                $tableNameWithGuionPlural, $relationClass, $relationType, $pathSeeder);
            if($okBackEnd){
                $response .= "Ready module Seeder <br>";
            }
        }


        /****************
         * Factory
         ****************/
        if($factory_ck){
            $fileBackEnd = new GenerateToApiFactory();
            $okBackEnd = $fileBackEnd->__invoke($tableSingular, $tablePlural, $columns, $nameSpace, $templateType,
                $classNameSingularUp, $classNamePluralUp, $tableNameWithGuion,
                $tableNameWithGuionPlural, $relationClass, $relationType, $pathFactory);
            if($okBackEnd){
                $response .= "Ready module Factory <br>";
            }
        }



        //TODO pendiente  $testunit_ck




    }


}
