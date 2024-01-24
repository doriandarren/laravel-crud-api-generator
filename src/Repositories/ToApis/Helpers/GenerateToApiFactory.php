<?php

namespace Infinito\LaravelCrudApiGenerator\Repositories\ToApis\Helpers;


use Infinito\LaravelCrudApiGenerator\Enums\EnumFolderToApi;
use Infinito\LaravelCrudApiGenerator\Helpers\HelperFiles;


class GenerateToApiFactory
{


    public function __invoke($tableSingular, $tablePlural, $columns, $nameSpace, $templateType, $classNameSingularUp,
                             $classNamePluralUp, $tableNameWithGuion, $tableNameWithGuionPlural, $relationClass,
                             $relationType, $path)
    {


        $contents = HelperFiles::formatLineBreakAndTab("<?php", null, 2);

        $contents .= HelperFiles::formatLineBreakAndTab('namespace Database\Factories;', null, 2);

        $contents .= HelperFiles::formatLineBreakAndTab('use Illuminate\Database\Eloquent\Factories\Factory;', null, 1);
        //$contents .= HelperFiles::formatLineBreakAndTab('use App\Models\\' . $classNameSingularUp . ';', null, 2);



        $contents .= HelperFiles::formatLineBreakAndTab('/**', null, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('* @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\\' . $classNamePluralUp . '\\' . $classNameSingularUp . '>', null, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('*/', null, 1);




        $contents .= HelperFiles::formatLineBreakAndTab('class ' . $classNameSingularUp . 'Factory extends Factory', null, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('{', null, 2);




        $contents .= HelperFiles::formatLineBreakAndTab('/**', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('* Define the model\'s default state.', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('*', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('* @return array<string, mixed>', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('*/', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('public function definition()', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('{', null, 1, 1);



        $contents .= HelperFiles::formatLineBreakAndTab('// php artisan make:factory '.$classNameSingularUp.'Factory', null, 2, 2);


        $contents .= HelperFiles::formatLineBreakAndTab('return [', null, 1, 2);
        foreach($columns as $col){
            $contents .= HelperFiles::formatLineBreakAndTab('\''.$col->name.'\' => $this->faker->word(),',null,1,3);
        }
        $contents .= HelperFiles::formatLineBreakAndTab('];', null, 2, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('}', null, 2, 1);


        $contents .= HelperFiles::formatLineBreakAndTab('}', null, 1);



        try {

            $p = $path . '/' . $classNamePluralUp;

            if(!file_exists($p)){
                mkdir($p, 0777, true);
            }
            // Write File
            $fh = fopen($p . '/' . $classNameSingularUp . EnumFolderToApi::FACTORY . '.php', 'w+') or die("Error open file: " . $classNameSingularUp . EnumFolderToApi::FACTORY . '.php');
            fwrite($fh, $contents)or die("Error write file: " . $classNameSingularUp . EnumFolderToApi::FACTORY . '.php');
            fclose($fh);

            return true;

        }catch (\Exception $e){
            error_log($e->getMessage() . ' path: ' . $p, 0);
            return false;
        }




    }

}
