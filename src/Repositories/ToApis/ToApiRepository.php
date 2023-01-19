<?php

namespace Infinito\LaravelCrudApiGenerator\Repositories\ToApis;

use Infinito\LaravelCrudApiGenerator\Repositories\ToApis\Helpers\GenerateToApiDestroyController;
use Infinito\LaravelCrudApiGenerator\Repositories\ToApis\Helpers\GenerateToApiListController;
use Infinito\LaravelCrudApiGenerator\Repositories\ToApis\Helpers\GenerateToApiListPaginateController;
use Infinito\LaravelCrudApiGenerator\Repositories\ToApis\Helpers\GenerateToApiModel;
use Infinito\LaravelCrudApiGenerator\Repositories\ToApis\Helpers\GenerateToApiRepository;
use Infinito\LaravelCrudApiGenerator\Repositories\ToApis\Helpers\GenerateToApiRoute;
use Infinito\LaravelCrudApiGenerator\Repositories\ToApis\Helpers\GenerateToApiShowController;
use Infinito\LaravelCrudApiGenerator\Repositories\ToApis\Helpers\GenerateToApiStoreController;
use Infinito\LaravelCrudApiGenerator\Repositories\ToApis\Helpers\GenerateToApiUpdateController;

class ToApiRepository
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




        $classNameSingularUp = ucwords($tableSingular);
        $classNamePluralUp = ucwords($tablePlural);

        //Convert to example_class
        $arr = preg_split('/(?=[A-Z])/', $tableSingular);
        $tableNameWithGuion = '';
        for ($i = 0; $i < count($arr); $i++) {
            if ($i == 0) {
                $tableNameWithGuion = $arr[0];
            } else {
                $tableNameWithGuion .= '_' . strtolower($arr[$i]);
            }
        }

        //Convert to example_class
        $arr = preg_split('/(?=[A-Z])/', $tablePlural);
        $tableNameWithGuionPlural = '';
        for ($i = 0; $i < count($arr); $i++) {
            if ($i == 0) {
                $tableNameWithGuionPlural = $arr[0];
            } else {
                $tableNameWithGuionPlural .= '_' . strtolower($arr[$i]);
            }
        }

        $nameSpace = str_replace("/", '\\', $nameSpace);

        $response = '';



        $dir = dirname(__FILE__,7);
        $pathController = $dir . "/" . "app/Http/Controllers/" . $classNamePluralUp;
        $pathModel = $dir . "/" . "app/Models/" . $classNamePluralUp;
        $pathRepository = $dir . "/" . "app/Repositories/" . $classNamePluralUp;
        $pathRoute = $dir . "/" . "routes";





        /***************
         * CONTROLLERS
         **************/

        // List
        $fileBackEnd = new GenerateToApiListController();
        $okBackEnd = $fileBackEnd->__invoke($tableSingular, $tablePlural, $columns, $nameSpace, $templateType,
            $classNameSingularUp, $classNamePluralUp, $tableNameWithGuion,
            $tableNameWithGuionPlural, $relationClass, $relationType, $pathController);
        if($okBackEnd){
            $response = "<br> Ready module API List <br>";
        }


        // List Paginate
        $fileBackEnd = new GenerateToApiListPaginateController();
        $okBackEnd = $fileBackEnd->__invoke($tableSingular, $tablePlural, $columns, $nameSpace, $templateType,
            $classNameSingularUp, $classNamePluralUp, $tableNameWithGuion,
            $tableNameWithGuionPlural, $relationClass, $relationType, $pathController);
        if($okBackEnd){
            $response .= "Ready module API list Paginate <br>";
        }



        // Show
        $fileBackEnd = new GenerateToApiShowController();
        $okBackEnd = $fileBackEnd->__invoke($tableSingular, $tablePlural, $columns, $nameSpace, $templateType,
            $classNameSingularUp, $classNamePluralUp, $tableNameWithGuion,
            $tableNameWithGuionPlural, $relationClass, $relationType, $pathController);
        if($okBackEnd){
            $response .= "Ready module API Show <br>";
        }




        // Store
        $fileBackEnd = new GenerateToApiStoreController();
        $okBackEnd = $fileBackEnd->__invoke($tableSingular, $tablePlural, $columns, $nameSpace, $templateType,
            $classNameSingularUp, $classNamePluralUp, $tableNameWithGuion,
            $tableNameWithGuionPlural, $relationClass, $relationType, $pathController);
        if($okBackEnd){
            $response .= "Ready module API Store <br>";
        }


        // Update
        $fileBackEnd = new GenerateToApiUpdateController();
        $okBackEnd = $fileBackEnd->__invoke($tableSingular, $tablePlural, $columns, $nameSpace, $templateType,
            $classNameSingularUp, $classNamePluralUp, $tableNameWithGuion,
            $tableNameWithGuionPlural, $relationClass, $relationType, $pathController);
        if($okBackEnd){
            $response .= "Ready module API Update <br>";
        }



        // Destroy
        $fileBackEnd = new GenerateToApiDestroyController();
        $okBackEnd = $fileBackEnd->__invoke($tableSingular, $tablePlural, $columns, $nameSpace, $templateType,
            $classNameSingularUp, $classNamePluralUp, $tableNameWithGuion,
            $tableNameWithGuionPlural, $relationClass, $relationType, $pathController);
        if($okBackEnd){
            $response .= "Ready module API Destroy <br>";
        }




        /****************
         * MODEL
         ****************/

        $fileModel = new GenerateToApiModel();
        $okRepository = $fileModel->__invoke($tableSingular, $tablePlural, $columns, $nameSpace, $templateType,
            $classNameSingularUp, $classNamePluralUp, $tableNameWithGuion,
            $tableNameWithGuionPlural, $relationClass, $relationType, $pathModel);
        if($okRepository){
            $response .= "Ready module Model <br>";
        }





        /****************
         * REPOSITORY
         ****************/
        $fileRepository = new GenerateToApiRepository();
        $okRepository = $fileRepository->__invoke($tableSingular, $tablePlural, $columns, $nameSpace, $templateType, $pathRepository);
        if($okRepository){
            $response .= "Ready module Repository <br>";
        }




        /****************
         * ROUTES
         ****************/
        $fileBackEnd = new GenerateToApiRoute();
        $okBackEnd = $fileBackEnd->__invoke($tableSingular, $tablePlural, $columns, $nameSpace, $templateType,
            $classNameSingularUp, $classNamePluralUp, $tableNameWithGuion,
            $tableNameWithGuionPlural, $relationClass, $relationType, $pathRoute);
        if($okBackEnd){
            $response .= "Ready module API Back <br>";
        }










        echo $response;


    }


}
