<?php

namespace Infinito\LaravelCrudApiGenerator\Repositories\ToApis\Helpers;

use Infinito\LaravelCrudApiGenerator\Enums\EnumFolderToApi;
use Infinito\LaravelCrudApiGenerator\Helpers\HelperFiles;

class GenerateToApiSeeder
{


    public function __invoke($tableSingular, $tablePlural, $columns, $nameSpace, $templateType, $classNameSingularUp,
                             $classNamePluralUp, $tableNameWithGuion, $tableNameWithGuionPlural, $relationClass,
                             $relationType, $path)
    {

        $contents = HelperFiles::formatLineBreakAndTab("<?php", null, 2);

        $contents .= HelperFiles::formatLineBreakAndTab('namespace Database\Seeders;', null, 2);

        $contents .= HelperFiles::formatLineBreakAndTab('use Illuminate\Database\Seeder;', null, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('use App\Models\\' . $classNameSingularUp . ';', null, 2);



        $contents .= HelperFiles::formatLineBreakAndTab('class ' . $classNameSingularUp . 'Seeder extends Seeder', null, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('{', null, 2);




        $contents .= HelperFiles::formatLineBreakAndTab('/**', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('* Run the database seeds.', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('*', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('* @return void', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('*/', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('public function run()', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('{', null, 1, 1);

        $contents .= HelperFiles::formatLineBreakAndTab('// php artisan make:seeder '.$classNameSingularUp.'Seeder', null, 2, 2);

        $contents .= HelperFiles::formatLineBreakAndTab('' . $classNameSingularUp . '::factory()->create([', null, 1, 2);
        foreach($columns as $col){
            $contents .= HelperFiles::formatLineBreakAndTab('\''.$col->name.'\' => \''.$col->name. '\',',null,1,3);
        }

        $contents .= HelperFiles::formatLineBreakAndTab(']);', null, 2, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('}', null, 2, 1);


        $contents .= HelperFiles::formatLineBreakAndTab('}', null, 1);



        try {

            if(!file_exists($path)){
                mkdir($path, 0777, true);
            }
            // Write File
            $fh = fopen($path . '/' . $classNameSingularUp . EnumFolderToApi::SEEDER . '.php', 'w+') or die("Error open file: " . $classNameSingularUp . EnumFolderToApi::SEEDER . '.php');
            fwrite($fh, $contents)or die("Error write file: " . $classNameSingularUp . EnumFolderToApi::SEEDER . '.php');
            fclose($fh);

            return true;

        }catch (\Exception $e){
            return false;
        }


    }



}
