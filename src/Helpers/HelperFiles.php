<?php

namespace Infinito\LaravelCrudApiGenerator\Helpers;

class HelperFiles
{

    /**
     * Method for:
     *  - Jump Line Before and After
     *  - Tabulations Line Before and After
     *
     * @param $str
     * @param null $jumpLineBefore
     * @param null $jumpLineAfter
     * @param null $tabBefore
     * @param null $tabAfter
     * @return string
     */
    public static function formatLineBreakAndTab($str, $jumpLineBefore = null, $jumpLineAfter = null,
                                                 $tabBefore=null, $tabAfter=null){

        $contents = '';

        //$strReplace = str_replace("'", "\'", $str);

        if($jumpLineBefore){
            for($i=0; $i<$jumpLineBefore; $i++){
                $contents .= "\n";
            }
        }

        if($tabBefore){
            for($i=0; $i<$tabBefore; $i++){
                $contents .= "\t";
            }
        }

        $contents .= $str;

        if($tabAfter){
            for($i=0; $i<$tabAfter; $i++){
                $contents .= "\t";
            }
        }

        if($jumpLineAfter){
            for($i=0; $i<$jumpLineAfter; $i++){
                $contents .= "\n";
            }
        }
        return $contents;
    }




    public static function createFile($path, $contents)
    {

        if(!file_exists($path)){
            mkdir($path, 0777, true);
        }

        // Write File
        $fh = fopen($path, 'w+') or die("Error open file: " . $path);
        fwrite($fh, $contents)or die("Error write file: " . $path);
        fclose($fh);

    }



}
