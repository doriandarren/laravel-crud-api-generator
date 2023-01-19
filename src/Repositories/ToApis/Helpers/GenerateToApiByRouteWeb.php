<?php

namespace Infinito\LaravelCrudApiGenerator\Repositories\ToApis\Helpers;

class GenerateToApiByRouteWeb
{



    public function __invoke($pathRoute)
    {

        $patWeb =  $pathRoute . '/web.php';


        $str = 'Route::get(\'/\', function () {
            return view(\'generator\');
        });';


        $fp = fopen($patWeb, "a+");
        fputs($fp, $str);
        fclose($fp);

    }



}
