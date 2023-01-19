<?php

namespace Infinito\LaravelCrudApiGenerator\Repositories\ToApis\Helpers;

use Infinito\LaravelCrudApiGenerator\Enums\EnumFolderToApi;
use Infinito\LaravelCrudApiGenerator\Helpers\HelperFiles;

class GenerateToApiMigration
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
     * @return bool|void
     */
    public function __invoke($tableSingular, $tablePlural, $columns, $nameSpace, $templateType,
                             $classNameSingularUp, $classNamePluralUp, $tableNameWithGuion,
                             $tableNameWithGuionPlural, $relationClass, $relationType, $path)
    {

        $contents = '';


        //Header
        $contents .= HelperFiles::formatLineBreakAndTab("<?php", null, 2);
        $contents .= HelperFiles::formatLineBreakAndTab("use Illuminate\Database\Migrations\Migration;", null, 1);
        $contents .= HelperFiles::formatLineBreakAndTab("use Illuminate\Database\Schema\Blueprint;", null, 1);
        $contents .= HelperFiles::formatLineBreakAndTab("use Illuminate\Support\Facades\Schema;", null, 2);


        //UP
        $contents .= HelperFiles::formatLineBreakAndTab("// OLD VERSIONS", null,1);
        $contents .= HelperFiles::formatLineBreakAndTab("// UP", null,1);
        $contents .= HelperFiles::formatLineBreakAndTab("//\$table->increments();  // Old version", null);
        $contents .= HelperFiles::formatLineBreakAndTab("//Example Relations ", null, 1);
        $contents .= HelperFiles::formatLineBreakAndTab("//\$table->unsignedBigInteger('". strtolower($tableNameWithGuion) ."_id');", null, 1);
        $contents .= HelperFiles::formatLineBreakAndTab("//\$table->foreign('". strtolower($tableNameWithGuion) ."_id')->references('id')->on('TABLE_REF');", null, 1);
        //DOWN
        $contents .= HelperFiles::formatLineBreakAndTab("// DOWN", null,1);
        $contents .= HelperFiles::formatLineBreakAndTab("//		if (Schema::connection('api')->hasColumn('". strtolower($tableNameWithGuionPlural) ."', '". strtolower($tableNameWithGuion) ."_id')) { ", null, 1);
        $contents .= HelperFiles::formatLineBreakAndTab("//			Schema::connection('api')->table('". strtolower($tableNameWithGuion) ."', function (Blueprint \$table) {", null, 1);
        $contents .= HelperFiles::formatLineBreakAndTab("//				\$table->dropForeign(['". strtolower($tableNameWithGuion) ."_id']);", null, 1);
        $contents .= HelperFiles::formatLineBreakAndTab("//				\$table->dropColumn('". strtolower($tableNameWithGuion) ."_id');", null, 1);
        $contents .= HelperFiles::formatLineBreakAndTab("//			});", null, 1);
        $contents .= HelperFiles::formatLineBreakAndTab("//		}", null, 3);


        //Class
        $contents .= HelperFiles::formatLineBreakAndTab("class $classNameSingularUp extends Migration", null, 1);
        $contents .= HelperFiles::formatLineBreakAndTab("{", null, 1);


        //Module UP
        $contents .= HelperFiles::formatLineBreakAndTab("/**", null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab("* Run the migrations.", null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab("*", null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab("* @return void", null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab("*/", null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab("public function up()", null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab(" {", null, 1, 1);



        $c = '';
        for($i=0; $i<count($columns); $i++){

            if($i == (count($columns) - 1)){
                $c .= $columns[$i]->name;
            }else{
                $c .= $columns[$i]->name . ' ';
            }
        }
        $contents .= HelperFiles::formatLineBreakAndTab('// ' . $c, null, 1, 2);



        $contents .= HelperFiles::formatLineBreakAndTab("if (!Schema::connection('api')->hasTable('". strtolower($tableNameWithGuionPlural) ."')) {", null, 2, 2);
        $contents .= HelperFiles::formatLineBreakAndTab("Schema::connection('api')->create('". strtolower($tableNameWithGuionPlural) ."', function (Blueprint \$table) {", null, 2, 3);
        $contents .= HelperFiles::formatLineBreakAndTab("\$table->id();", null, 1, 4);




        for($i=0; $i<count($columns); $i++){

            $contents .= HelperFiles::formatLineBreakAndTab("\$table->string('" . $columns[$i]->name . "')->nullable();", null, 1, 4);

        }

        $contents .= HelperFiles::formatLineBreakAndTab("\$table->timestamps();", null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab("\$table->softDeletes();", null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab("});", null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab("}", null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab("}", null, 2, 1);



        //Module DOWN
        $contents .= HelperFiles::formatLineBreakAndTab("/**", null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab("* Reverse the migrations.", null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab("*", null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab("* @return void", null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab("*/", null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab("public function down()", null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab("{", null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab("Schema::connection('api')->dropIfExists('". strtolower($tableNameWithGuionPlural) ."');", null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab("}", null, 4, 1);

        //END class
        $contents .= HelperFiles::formatLineBreakAndTab("}", null, 1);





        try {

            if(!file_exists($path)){
                mkdir($path, 0777, true);
            }
            // Write File
            $fh = fopen($path . '/create_' . strtolower($tableNameWithGuionPlural) . '_table_.php', 'w+') or die("Error open file: create_" . strtolower($tableNameWithGuionPlural) . '_table.php');
            fwrite($fh, $contents)or die("Error write file: create_" . $tableNameWithGuionPlural .  '_table.php');
            fclose($fh);

            return true;

        }catch (\Exception $e){
            return false;
        }



    }


}
