<?php

namespace Infinito\LaravelCrudApiGenerator;

use Infinito\LaravelCrudApiGenerator\Repositories\ToApis\Helpers\GenerateToApiInsideRouteWeb;

class Scripts
{

    public static function postPackageInstall()
    {

        echo "PASAAAAAAA";

        /***************
         * PATH's
         **************/
        $dir = dirname(__FILE__,7);
        $pathResources = $dir . "/" . "resources/views";
        $pathRoute = $dir . "/" . "routes";


        /***************
         * Write Web
         **************/
        // Add Route inside Web
        (new GenerateToApiInsideRouteWeb())->__invoke($pathRoute, $pathResources);

    }

}
