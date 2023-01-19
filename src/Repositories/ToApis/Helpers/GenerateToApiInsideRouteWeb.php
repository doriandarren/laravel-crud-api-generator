<?php

namespace Infinito\LaravelCrudApiGenerator\Repositories\ToApis\Helpers;

use Infinito\LaravelCrudApiGenerator\Helpers\HelperFiles;

class GenerateToApiInsideRouteWeb
{


    /**
     * @param $pathRoute
     * @return void
     */
    public function __invoke($pathRoute, $pathResources)
    {

        $this->createWebRoute($pathRoute);


        $this->createPageForm($pathResources);



    }




    private function createWebRoute($pathRoute)
    {


        //TODO Validar que exista

        $patWeb =  $pathRoute . '/web.php';

        $str = 'Route::get(\'/\', function () {';
        $str .= '    return view(\'generator\');';
        $str .= '});';


        $fp = fopen($patWeb, "a+");
        fputs($fp, $str);
        fclose($fp);

    }



    private function createPageForm($path)
    {

        //TODO validar que exista



        // Header
        $contents = HelperFiles::formatLineBreakAndTab("<!DOCTYPE html>", null, 1);





        try {

            if(!file_exists($path)){
                mkdir($path, 0777, true);
            }
            // Write File
            $fh = fopen($path . '/generator.blade.php', 'w+') or die("Error open file: generator.blade.php");
            fwrite($fh, $contents)or die("Error write file: generator.blade.php" );
            fclose($fh);

            return true;

        }catch (\Exception $e){
            return false;
        }



    }


}
