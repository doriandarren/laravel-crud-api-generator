<?php

namespace Infinito\LaravelCrudApiGenerator\Repositories\ToApis\Helpers;

use Infinito\LaravelCrudApiGenerator\Enums\EnumFolderToApi;
use Infinito\LaravelCrudApiGenerator\Helpers\HelperFiles;

class GenerateToApiRoute
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
        $contents = HelperFiles::formatLineBreakAndTab('<?php',null,3);

        $contents .= HelperFiles::formatLineBreakAndTab('use App\\Enums\\EnumAbilitySuffix;',null,1);
        $contents .= HelperFiles::formatLineBreakAndTab('use App\\Enums\\EnumApiSetup;',null,1);
        $contents .= HelperFiles::formatLineBreakAndTab('use App\\Http\\Controllers\\' . $nameSpace . '\\' . $classNamePluralUp . '\\' . $classNameSingularUp . EnumFolderToApi::LIST . 'Controller;',null,1);
        //$contents .= HelperFiles::formatLineBreakAndTab('use App\\Http\\Controllers\\' . $classNamePluralUp . '\\' . $classNameSingularUp . EnumFolderToApi::LIST_PAGINATE . 'Controller;',null,1);
        $contents .= HelperFiles::formatLineBreakAndTab('use App\\Http\\Controllers\\' . $nameSpace . '\\' . $classNamePluralUp . '\\' . $classNameSingularUp . EnumFolderToApi::SHOW . 'Controller;',null,1);
        $contents .= HelperFiles::formatLineBreakAndTab('use App\\Http\\Controllers\\' . $nameSpace . '\\' . $classNamePluralUp . '\\' . $classNameSingularUp . EnumFolderToApi::STORE . 'Controller;',null,1);
        $contents .= HelperFiles::formatLineBreakAndTab('use App\\Http\\Controllers\\' . $nameSpace . '\\' . $classNamePluralUp . '\\' . $classNameSingularUp . EnumFolderToApi::UPDATE . 'Controller;',null,1);
        $contents .= HelperFiles::formatLineBreakAndTab('use App\\Http\\Controllers\\' . $nameSpace . '\\' . $classNamePluralUp . '\\' . $classNameSingularUp . EnumFolderToApi::DESTROY . 'Controller;',null,1);
        $contents .= HelperFiles::formatLineBreakAndTab('use Illuminate\\Support\\Facades\\Route;',null,2);



        $contents .= HelperFiles::formatLineBreakAndTab('/**',null,1);
        $contents .= HelperFiles::formatLineBreakAndTab('* '. $classNamePluralUp,null,1);
        $contents .= HelperFiles::formatLineBreakAndTab('*/',null,3);


        $contents .= HelperFiles::formatLineBreakAndTab('Route::group([\'prefix\' => EnumApiSetup::API_VERSION . \''. str_replace("_", "-", $tableNameWithGuionPlural) .'/\'], function () {',null,2);
        $contents .= HelperFiles::formatLineBreakAndTab('Route::group([\'middleware\' => \'auth:sanctum\'], function() {',null,2, 1);


//        $contents .= HelperFiles::formatLineBreakAndTab('// TO TEST',null,1, 2);
//        $contents .= HelperFiles::formatLineBreakAndTab('// Route::get(\'list\', [' . $classNameSingularUp . EnumFolderToApi::LIST . 'Controller::class, \'__invoke\'])',null,1, 2);
//        $contents .= HelperFiles::formatLineBreakAndTab('// Route::get(\'list/paginate\', [' . $classNameSingularUp . EnumFolderToApi::LIST_PAGINATE . 'Controller::class, \'__invoke\'])',null,1, 2);
//        $contents .= HelperFiles::formatLineBreakAndTab('// Route::get(\'show/{' . $tableNameWithGuion . ':id}\', [' . $classNameSingularUp . EnumFolderToApi::SHOW . 'Controller::class, \'__invoke\'])',null,1, 2);
//        $contents .= HelperFiles::formatLineBreakAndTab('// Route::post(\'store\', [' . $classNameSingularUp . EnumFolderToApi::STORE . 'Controller::class, \'__invoke\'])',null,1, 2);
//        $contents .= HelperFiles::formatLineBreakAndTab('// Route::put(\'update/{' . $tableNameWithGuion . ':id}\', [' . $classNameSingularUp . EnumFolderToApi::UPDATE . 'Controller::class, \'__invoke\'])',null,1, 2);
//        $contents .= HelperFiles::formatLineBreakAndTab('// Route::delete(\'delete/{' . $tableNameWithGuion . ':id}\', [' . $classNameSingularUp . EnumFolderToApi::DESTROY . 'Controller::class, \'__invoke\'])',null,2, 3);


        $contents .= HelperFiles::formatLineBreakAndTab('Route::get(\'list\', [' . $classNameSingularUp . EnumFolderToApi::LIST . 'Controller::class, \'__invoke\'])->middleware(\'abilities:' . $tableNameWithGuionPlural . '\' . EnumAbilitySuffix::LIST);',null,1, 2);
        //$contents .= HelperFiles::formatLineBreakAndTab('Route::get(\'list/paginate\', [' . $classNameSingularUp . EnumFolderToApi::LIST_PAGINATE . 'Controller::class, \'__invoke\'])->middleware(\'abilities:' . $tableNameWithGuionPlural . '\' . EnumAbilitySuffix::LIST);',null,1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('Route::get(\'show/{' . $tableNameWithGuion . ':id}\', [' . $classNameSingularUp . EnumFolderToApi::SHOW . 'Controller::class, \'__invoke\'])->middleware(\'abilities:' . $tableNameWithGuionPlural . '\' . EnumAbilitySuffix::SHOW);',null,1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('Route::post(\'store\', [' . $classNameSingularUp . EnumFolderToApi::STORE . 'Controller::class, \'__invoke\'])->middleware(\'abilities:' . $tableNameWithGuionPlural . '\' . EnumAbilitySuffix::STORE);',null,1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('Route::put(\'update/{' . $tableNameWithGuion . ':id}\', [' . $classNameSingularUp . EnumFolderToApi::UPDATE . 'Controller::class, \'__invoke\'])->middleware(\'abilities:' . $tableNameWithGuionPlural . '\' . EnumAbilitySuffix::UPDATE);',null,1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('Route::delete(\'delete/{' . $tableNameWithGuion . ':id}\', [' . $classNameSingularUp . EnumFolderToApi::DESTROY . 'Controller::class, \'__invoke\'])->middleware(\'abilities:' . $tableNameWithGuionPlural . '\' . EnumAbilitySuffix::DESTROY);',null,2, 2);

        $contents .= HelperFiles::formatLineBreakAndTab('});',null,1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('});',null,1);


        try {

            if(!file_exists($path)){
                mkdir($path, 0777, true);
            }
            // Write File
            $fh = fopen($path . '/api_' . $tableNameWithGuionPlural . '.php', 'w+') or die("Error open file: api_" . $tableNameWithGuionPlural . '.php');
            fwrite($fh, $contents)or die("Error write file: api_" . $tableNameWithGuionPlural .  '.php');
            fclose($fh);

            return true;

        }catch (\Exception $e){
            return false;
        }

    }


}
