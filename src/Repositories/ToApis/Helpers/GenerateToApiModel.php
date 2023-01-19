<?php

namespace Infinito\LaravelCrudApiGenerator\Repositories\ToApis\Helpers;

use Infinito\LaravelCrudApiGenerator\Enums\EnumFolderToApi;
use Infinito\LaravelCrudApiGenerator\Helpers\HelperFiles;

class GenerateToApiModel
{


    const HAS_MANY = 1;
    const BELONG_TO = 2;


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
    public function __invoke($tableSingular, $tablePlural, $columns, $nameSpace, $templateType,
                             $classNameSingularUp, $classNamePluralUp, $tableNameWithGuion,
                             $tableNameWithGuionPlural, $relationClass, $relationType, $path): bool
    {



        $contents = '';

        //Header
        $contents .= HelperFiles::formatLineBreakAndTab("<?php",null,2);
        $contents .= HelperFiles::formatLineBreakAndTab("namespace App\Models\\". $classNamePluralUp .';',null,2);
        $contents .= HelperFiles::formatLineBreakAndTab("//use App\Models\SystemConst;",null,1);
        $contents .= HelperFiles::formatLineBreakAndTab("use Illuminate\Database\Eloquent\Model;",null,2);
        //End Header




        //Begin Class
        $contents .= HelperFiles::formatLineBreakAndTab("class ". $classNameSingularUp ." extends Model",null,1);
        $contents .= HelperFiles::formatLineBreakAndTab("{",null,2);
        $contents .= HelperFiles::formatLineBreakAndTab('//use SoftDeletes;',null,2,1);
        $contents .= HelperFiles::formatLineBreakAndTab("//protected $"."connection = 'api';",null,1,1);
        $contents .= HelperFiles::formatLineBreakAndTab("protected $"."table = '".$tableNameWithGuionPlural."';",null,2,1);


        //Relations
        $contents .= HelperFiles::formatLineBreakAndTab("/***********************",null,1,1);
        $contents .= HelperFiles::formatLineBreakAndTab("* RELATIONS",null,1,1);
        $contents .= HelperFiles::formatLineBreakAndTab("***********************/",null,2,1);
        $contents .= HelperFiles::formatLineBreakAndTab("//TODO add relation tables",null,1,1);



        if($relationClass != ''){

            $contents .= HelperFiles::formatLineBreakAndTab("public function " . strtolower($relationClass) . "()",null,1,1);
            $contents .= HelperFiles::formatLineBreakAndTab("{",null,1,1);

            switch ($relationType){

                case self::HAS_MANY:
                    $contents .= HelperFiles::formatLineBreakAndTab('return $this->hasMany(' . $relationClass . '::class, \''. strtolower($relationClass) .'_id\', \'id\');',null,1,2);
                    break;

                case self::BELONG_TO:
                    $contents .= HelperFiles::formatLineBreakAndTab('return $this->belongsTo(' . $relationClass . '::class, \''. strtolower($relationClass) .'_id\', \'id\');',null,1,2);

                    break;

                default:
                    break;

            }

            $contents .= HelperFiles::formatLineBreakAndTab("}",null,2,1);

        }


        $contents .= HelperFiles::formatLineBreakAndTab("}",null,1);


        try {

            if(!file_exists($path)){
                mkdir($path, 0777, true);
            }
            // Write File
            $fh = fopen($path . '/' . $classNameSingularUp . '.php', 'w+') or die("Error open file: " . $classNameSingularUp . '.php');
            fwrite($fh, $contents)or die("Error write file: " . $classNameSingularUp . '.php');
            fclose($fh);

            return true;

        }catch (\Exception $e){
            return false;
        }

    }

}
