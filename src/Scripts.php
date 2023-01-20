<?php

namespace Infinito\LaravelCrudApiGenerator;

use Infinito\LaravelCrudApiGenerator\Repositories\ToApis\Helpers\GenerateToApiInsideRouteWeb;


class Scripts
{

    public function __invoke()
    {

        /***************
         * PATH's
         **************/
        $dir = dirname(__FILE__,2);
        $pathResources = $dir . "/" . "resources/views";
        $pathRoute = $dir . "/" . "routes";



        echo $pathRoute;


        /***************
         * Write Web
         **************/
        // Add Route inside Web
        (new GenerateToApiInsideRouteWeb())->__invoke($pathRoute, $pathResources);

    }

}
