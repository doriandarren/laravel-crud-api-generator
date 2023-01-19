<?php

namespace Infinito\LaravelCrudApiGenerator\Repositories\ToApis\Helpers;

use Infinito\LaravelCrudApiGenerator\Enums\EnumFolderToApi;
use Infinito\LaravelCrudApiGenerator\Helpers\HelperFiles;

class GenerateToApiScript
{

    /**
     * @param $tableSingular
     * @param $tablePlural
     * @param $columns
     * @param $nameSpace
     * @param $templateType
     * @param $classNameSingularUp
     * @param $classNamePluralUp
     * @param $tableNameWithGuion
     * @param $tableNameWithGuionPlural
     * @param $relationClass
     * @param $relationType
     * @param $path
     * @return bool
     */
    public function __invoke($tableSingular, $tablePlural, $columns, $nameSpace, $templateType, $classNameSingularUp,
                             $classNamePluralUp, $tableNameWithGuion, $tableNameWithGuionPlural, $relationClass,
                             $relationType, $path): bool
    {

        $contents = HelperFiles::formatLineBreakAndTab("Script Laravel:", null, 2);

        $contents .= HelperFiles::formatLineBreakAndTab('php artisan make:controller ' . $classNamePluralUp . '/' . $classNameSingularUp . EnumFolderToApi::LIST .'Controller &&', null, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('php artisan make:controller ' . $classNamePluralUp . '/' . $classNameSingularUp . EnumFolderToApi::LIST_PAGINATE .'Controller &&', null, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('php artisan make:controller ' . $classNamePluralUp . '/' . $classNameSingularUp . EnumFolderToApi::SHOW .'Controller &&', null, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('php artisan make:controller ' . $classNamePluralUp . '/' . $classNameSingularUp . EnumFolderToApi::STORE .'Controller &&', null, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('php artisan make:controller ' . $classNamePluralUp . '/' . $classNameSingularUp . EnumFolderToApi::UPDATE .'Controller &&', null, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('php artisan make:controller ' . $classNamePluralUp . '/' . $classNameSingularUp . EnumFolderToApi::DESTROY .'Controller &&', null, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('php artisan make:model ' . $classNamePluralUp . '/' . $classNameSingularUp . ' -mf', null, 4);



        $contents .= HelperFiles::formatLineBreakAndTab('php artisan make:migration create_' . strtolower($tableNameWithGuion) . '_table', null, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('php artisan make:factory ' . $classNamePluralUp . '/' . $classNameSingularUp, null, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('php artisan make:seeder ' . $classNamePluralUp . '/' . $classNameSingularUp . 'Seeder', null, 1);





        try {

            if(!file_exists($path)){
                mkdir($path, 0777, true);
            }
            // Write File
            $fh = fopen($path . '/Script_'.$classNameSingularUp.'.txt', 'w+') or die("Error open file: Script_'.$classNameSingularUp.'.txt");
            fwrite($fh, $contents)or die("Error write file: Script_'.$classNameSingularUp.'.txt");
            fclose($fh);

            return true;

        }catch (\Exception $e){
            return false;
        }


    }



}
