<?php

namespace Infinito\LaravelCrudApiGenerator\Repositories\ToApis;

use Infinito\LaravelCrudApiGenerator\Repositories\ToApis\Helpers\GenerateToApiListController;

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



        echo "RUTA: " . $dir;

        echo "<br>---<br>";

        //echo $containing_dir = basename(dirname(__FILE__));



        // List
        $fileBackEnd = new GenerateToApiListController();
        $okBackEnd = $fileBackEnd->__invoke($tableSingular, $tablePlural, $columns, $nameSpace, $templateType,
            $classNameSingularUp, $classNamePluralUp, $tableNameWithGuion,
            $tableNameWithGuionPlural, $relationClass, $relationType, $pathController);
        if($okBackEnd){
            $response = "<br> Ready module API List <br>";
        }



        echo $response;


    }


}
