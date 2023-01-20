<?php

namespace Infinito\LaravelCrudApiGenerator;

use Infinito\LaravelCrudApiGenerator\Repositories\ToApis\Helpers\GenerateToApiInsideRouteWeb;
use Composer\Script\Event;
use Composer\Installer\PackageEvent;


class Scripts
{

    public static function postPackageInstall(Event $event)
    {

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
