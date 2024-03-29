<?php

namespace Infinito\LaravelCrudApiGenerator\Repositories\ToApis\Helpers;

use Infinito\LaravelCrudApiGenerator\Helpers\HelperFiles;

class GenerateToApiInsideRouteWeb
{


    const FLAG_ROUTE = '->flag_generator';



    /**
     * @param $pathRoute
     * @param $pathResources
     * @param $pathController
     * @return void
     */
    public function __invoke($pathRoute, $pathResources, $pathController)
    {

        $this->createWebRoute($pathRoute);

        $this->createPageForm($pathResources);

        $this->createController($pathController . '/Generator');

    }




    private function createWebRoute($pathRoute)
    {
        $patWeb =  $pathRoute . '/web.php';
        $fpR = fopen($patWeb, "r");

        $flag = false;

        while (!feof($fpR)){
            $line = fgets($fpR);
            if(strpos($line, self::FLAG_ROUTE) !== false){
                $flag = true;
            }
        }
        fclose($fpR);



        if(!$flag){
            $fpW = fopen($patWeb, "a+");
            $str = PHP_EOL . PHP_EOL . '// Route By GENERATOR ' . self::FLAG_ROUTE . PHP_EOL;
            $str .= 'Route::get(\'/generator\', function () { '.PHP_EOL.'    return view(\'generator\'); '.PHP_EOL.'});' . PHP_EOL. PHP_EOL;
            $str .= 'Route::post(\'/generator/create\', [App\Http\Controllers\Generator\GeneratorController::class, \'__invoke\'] )->name(\'generator.create\');';
            fputs($fpW, $str);
            fclose($fpW);
        }


    }


    private function createPageForm($path)
    {

        // Header
        $contents = HelperFiles::formatLineBreakAndTab('<!DOCTYPE html>', null, 2);
        $contents = HelperFiles::formatLineBreakAndTab('@if(env(\'APP_ENV\') !== \'production\')', null, 2);

        $contents .= HelperFiles::formatLineBreakAndTab('<html lang="{{ str_replace(\'_\', \'-\', app()->getLocale()) }}">', null, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('<head>', null, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('<meta charset="utf-8">', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('<meta name="viewport" content="width=device-width, initial-scale=1">', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('<title>Generator</title>', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('</head>', null, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('<body>', null, 1);

        // BEGIN
        $contents .= HelperFiles::formatLineBreakAndTab('<div class="flex mb-4">', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('<div class="w-full bg-gray-500 h-12"></div>', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('</div>', null, 1, 1);



        $contents .= HelperFiles::formatLineBreakAndTab('<div class="rounded overflow-hidden shadow-lg m-20">', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('<div class="px-6 py-4">', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('<div class="font-bold text-xl mb-2">Generator</div>', null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab('<div class="grid grid-cols-1 gap-4">', null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab('<div class="form-group mb-6">', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('<label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('Nombres de Columnas', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('</label>', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('<input', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('id="input_format"', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('type="text"', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('>', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('</div>', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('</div>', null, 1, 3);




        $contents .= HelperFiles::formatLineBreakAndTab('<div class="pt-4 pb-2">', null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab('<button', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('class="px-3 py-3 bg-blue-600 text-white font-medium leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('id="btn_format"', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('>', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('Agregar columnas', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('</button>', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('</div>', null, 1, 3);





        $contents .= HelperFiles::formatLineBreakAndTab('<div class="grid grid-cols-3 gap-4 mt-10">', null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab('<div class="col-span-3">', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('<label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('Tipo', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('</label>', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('</div>', null, 1, 4);





        $contents .= HelperFiles::formatLineBreakAndTab('<div class="col-span-3">', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('<div>', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('<label for="all_ck">Todos</label>', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('<input type="checkbox" name="all_ck" id="all_ck" checked>', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('</div>', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('</div>', null, 1, 4);



        $contents .= HelperFiles::formatLineBreakAndTab('<div class="col-span-3">', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('<div class="grid grid-cols-3">', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('<div class="col-span-1">', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('<div class="flex flex-col">', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('<div class="mb-3">', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab('<label for="list_ck">List</label>', null, 1, 9);
        $contents .= HelperFiles::formatLineBreakAndTab('<input type="checkbox" name="list_ck" id="list_ck" checked>', null, 1, 9);
        $contents .= HelperFiles::formatLineBreakAndTab('</div>', null, 1, 8);





        $contents .= HelperFiles::formatLineBreakAndTab('<div class="mb-3">', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab('<label for="show_ck">Show</label>', null, 1, 9);
        $contents .= HelperFiles::formatLineBreakAndTab('<input type="checkbox" name="show_ck" id="show_ck" checked>', null, 1, 9);
        $contents .= HelperFiles::formatLineBreakAndTab('</div>', null, 1, 8);



        $contents .= HelperFiles::formatLineBreakAndTab('<div class="mb-3">', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab('<label for="store_ck">Store</label>', null, 1, 9);
        $contents .= HelperFiles::formatLineBreakAndTab('<input type="checkbox" name="store_ck" id="store_ck" checked>', null, 1, 9);
        $contents .= HelperFiles::formatLineBreakAndTab('</div>', null, 1, 8);


        $contents .= HelperFiles::formatLineBreakAndTab('<div class="mb-3">', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab('<label for="update_ck">Update</label>', null, 1, 9);
        $contents .= HelperFiles::formatLineBreakAndTab('<input type="checkbox" name="update_ck" id="update_ck" checked>', null, 1, 9);
        $contents .= HelperFiles::formatLineBreakAndTab('</div>', null, 1, 8);


        $contents .= HelperFiles::formatLineBreakAndTab('<div class="mb-3">', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab('<label for="destroy_ck">Destroy</label>', null, 1, 9);
        $contents .= HelperFiles::formatLineBreakAndTab('<input type="checkbox" name="destroy_ck" id="destroy_ck" checked>', null, 1, 9);
        $contents .= HelperFiles::formatLineBreakAndTab('</div>', null, 1, 8);

        $contents .= HelperFiles::formatLineBreakAndTab('</div>', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('</div>', null, 1, 6);




        $contents .= HelperFiles::formatLineBreakAndTab('<div class="col-span-1">', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('<div class="flex flex-col">', null, 1, 7);

        $contents .= HelperFiles::formatLineBreakAndTab('<div class="mb-3">', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab('<label for="model_ck">Model</label>', null, 1, 9);
        $contents .= HelperFiles::formatLineBreakAndTab('<input type="checkbox" name="model_ck" id="model_ck" checked>', null, 1, 9);
        $contents .= HelperFiles::formatLineBreakAndTab('</div>', null, 1, 8);



        $contents .= HelperFiles::formatLineBreakAndTab('<div class="mb-3">', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab('<label for="repository_ck">Repository</label>', null, 1, 9);
        $contents .= HelperFiles::formatLineBreakAndTab('<input type="checkbox" name="repository_ck" id="repository_ck" checked>', null, 1, 9);
        $contents .= HelperFiles::formatLineBreakAndTab('</div>', null, 1, 8);


        $contents .= HelperFiles::formatLineBreakAndTab('<div class="mb-3">', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab('<label for="route_ck">Route</label>', null, 1, 9);
        $contents .= HelperFiles::formatLineBreakAndTab('<input type="checkbox" name="route_ck" id="route_ck" checked>', null, 1, 9);
        $contents .= HelperFiles::formatLineBreakAndTab('</div>', null, 1, 8);

        $contents .= HelperFiles::formatLineBreakAndTab('</div>', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('</div>', null, 1, 6);


        $contents .= HelperFiles::formatLineBreakAndTab('<div class="col-span-1">', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('<div class="flex flex-col">', null, 1, 7);


        $contents .= HelperFiles::formatLineBreakAndTab('<div class="mb-3">', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab('<label for="migration_ck">Migration</label>', null, 1, 9);
        $contents .= HelperFiles::formatLineBreakAndTab('<input type="checkbox" name="migration_ck" id="migration_ck" checked>', null, 1, 9);
        $contents .= HelperFiles::formatLineBreakAndTab('</div>', null, 1, 8);

        $contents .= HelperFiles::formatLineBreakAndTab('<div class="mb-3">', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab('<label for="seeder_ck">Seeder</label>', null, 1, 9);
        $contents .= HelperFiles::formatLineBreakAndTab('<input type="checkbox" name="seeder_ck" id="seeder_ck" checked>', null, 1, 9);
        $contents .= HelperFiles::formatLineBreakAndTab('</div>', null, 1, 8);


        $contents .= HelperFiles::formatLineBreakAndTab('<div class="mb-3">', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab('<label for="factory_ck">Factory</label>', null, 1, 9);
        $contents .= HelperFiles::formatLineBreakAndTab('<input type="checkbox" name="factory_ck" id="factory_ck" checked>', null, 1, 9);
        $contents .= HelperFiles::formatLineBreakAndTab('</div>', null, 1, 8);


        $contents .= HelperFiles::formatLineBreakAndTab('<div class="mb-3">', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab('<label for="migration_ck">TestUnit</label>', null, 1, 9);
        $contents .= HelperFiles::formatLineBreakAndTab('<input type="checkbox" name="testunit_ck" id="testunit_ck" checked>', null, 1, 9);
        $contents .= HelperFiles::formatLineBreakAndTab('</div>', null, 1, 8);

        $contents .= HelperFiles::formatLineBreakAndTab('</div>', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('</div>', null, 1, 6);


        $contents .= HelperFiles::formatLineBreakAndTab('</div>', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('</div>', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('</div>', null, 1, 3);






        $contents .= HelperFiles::formatLineBreakAndTab('<div class="grid grid-cols-3 gap-4 mt-10">', null, 1, 3);


        // Block
        $contents .= HelperFiles::formatLineBreakAndTab('<div class="form-group mb-6">', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('<label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="template_type">', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('Plantilla', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('</label>', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('<div class="relative">', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('<select', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('id="template_type"', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('>', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('<option value="1">Principal</option>', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('<option value="2">App v1</option>', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('<option value="3" selected>Vuexy v1</option>', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('</select>', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('<div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('<svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('</div>', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('</div>', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('</div>', null, 1, 4);



        // Block
        $contents .= HelperFiles::formatLineBreakAndTab('<div class="form-group mb-6">', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('<label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('Tabla Singular', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('</label>', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('<input', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('type="text"', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('id="table_singular"', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('value="telepassElconSpain"', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('>', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('</div>', null, 1, 4);



        // Block
        $contents .= HelperFiles::formatLineBreakAndTab('<div class="form-group mb-6">', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('<label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('Tabla Plural', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('</label>', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('<input', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('type="text"', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('id="table_plural"', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('value="telepassElconSpains"', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('>', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('</div>', null, 1, 4);


        // END
        $contents .= HelperFiles::formatLineBreakAndTab('</div>', null, 1, 3);





        //START
        $contents .= HelperFiles::formatLineBreakAndTab('<div class="grid grid-cols-3 gap-4">', null, 1, 3);



        // Block
        $contents .= HelperFiles::formatLineBreakAndTab('<div class="form-group mb-6">', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('<label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('Nombre espacio / Bounded', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('</label>', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('<input', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('type="text"', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('id="name_space"', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('value="API"', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('>', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('</div>', null, 1, 4);




        // Block
        $contents .= HelperFiles::formatLineBreakAndTab('<div class="form-group mb-6">', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('<label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="relation_type_id">', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('Tipo de Relación', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('</label>', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('<div class="relative">', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('<select', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('id="relation_type_id"', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('>', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('<option value="1">hasMany</option>', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('<option value="2">belongTo</option>', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('</select>', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('<div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('<svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('</div>', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('</div>', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('</div>', null, 1, 4);






        // Block
        $contents .= HelperFiles::formatLineBreakAndTab('<div class="form-group mb-6">', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('<label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="relation_class_id">', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('Clase Relacional', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('</label>', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('<input', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('type="text"', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('id="relation_class_id"', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('value="ClassRelacion"', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('>', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('</div>', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('</div>', null, 1, 3);





        $contents .= HelperFiles::formatLineBreakAndTab('<hr>', null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab('<hr>', null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab('<div class="flex flex-wrap -mx-3 mb-6">', null, 1, 3);


        $contents .= HelperFiles::formatLineBreakAndTab('<div class="w-full px-3">', null, 1, 4);


        $contents .= HelperFiles::formatLineBreakAndTab('<label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('Columnas', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('</label>', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('<div id="div_column"></div>', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('</div>', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('</div>', null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab('</div>', null, 1, 2);




        $contents .= HelperFiles::formatLineBreakAndTab('<div class="px-6 pt-4 pb-2">', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('<button', null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab('class="px-3 py-3 bg-blue-600 text-white font-medium leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('id="save"', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('>', null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab('Generar', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('</button>', null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab('</div>', null, 1, 2);



        //END
        $contents .= HelperFiles::formatLineBreakAndTab('</div>', null, 3, 1);



        // Script
        $contents .= HelperFiles::formatLineBreakAndTab('<script>', null, 1, 1);

        $contents .= HelperFiles::formatLineBreakAndTab('let input_format = document.getElementById("input_format");', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('let div_column = document.getElementById("div_column");', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('let table_singular = document.getElementById("table_singular");', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('let table_plural = document.getElementById("table_plural");', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('let columns = document.getElementById("columns");', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('let relation_type_id = document.getElementById("relation_type_id");', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('let relation_class_id = document.getElementById("relation_class_id");', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('let name_space = document.getElementById("name_space");', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('let template_type = document.getElementById("template_type");', null, 2, 2);



        $contents .= HelperFiles::formatLineBreakAndTab('//Checkbox', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('let all_ck = document.querySelector("#all_ck");', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('let list_ck = document.querySelector("#list_ck");', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('let show_ck = document.querySelector("#show_ck");', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('let store_ck = document.querySelector("#store_ck");', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('let update_ck = document.querySelector("#update_ck");', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('let destroy_ck = document.querySelector("#destroy_ck");', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('let model_ck = document.querySelector("#model_ck");', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('let repository_ck = document.querySelector("#repository_ck");', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('let route_ck = document.querySelector("#route_ck");', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('let migration_ck = document.querySelector("#migration_ck");', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('let seeder_ck = document.querySelector("#seeder_ck");', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('let factory_ck = document.querySelector("#factory_ck");', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('let testunit_ck = document.querySelector("#testunit_ck");', null, 3, 2);



        $contents .= HelperFiles::formatLineBreakAndTab('function formatColumns() {', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('div_column.innerHTML = \'\';', null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab('let p = input_format.value;', null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab('let arrayString = p.split(\' \');', null, 2, 3);



        $contents .= HelperFiles::formatLineBreakAndTab('for (let i = 0; i < arrayString.length; i++) {', null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab('let select = document.createElement( \'select\' );', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('select.name = \'sel_\' + i;', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('select.id = \'sel_\' + i;', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('select.className = \'form-select column_type_group\';', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('let option;', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('let inputdata = \'text||select||radio\';', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('inputdata.split( \'||\' ).forEach(function( item ) {', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('option = document.createElement( \'option\' );', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('option.value = item;', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('option.textContent = item;', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('select.appendChild( option );', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('});', null, 2, 4);





        $contents .= HelperFiles::formatLineBreakAndTab('let divCont = document.createElement(\'div\');', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('divCont.className = \'form-group\';', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('let input = document.createElement(\'input\');', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('input.type = \'text\';', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('input.name = \'col_\' + i;', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('input.id = \'col_\' + i;', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('input.className = "form-control column_name_group mb-2";', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('input.value = arrayString[i];', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('divCont.appendChild(select);', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('divCont.appendChild(input);', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('div_column.appendChild(divCont);', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('}', null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab('}', null, 1, 2);



        $contents .= HelperFiles::formatLineBreakAndTab('async function readForm()', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('{', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('let data = {};', null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab('data.table_singular = table_singular.value;', null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab('data.table_plural = table_plural.value;', null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab('data.relation_class = relation_class_id.value;', null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab('data.relation_type = relation_type_id.value;', null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab('data.name_space = name_space.value;', null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab('data.template_type = template_type.options[template_type.selectedIndex].value;', null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab('data.list_ck = list_ck.checked;', null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab('data.show_ck = show_ck.checked;', null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab('data.store_ck = store_ck.checked;', null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab('data.update_ck = update_ck.checked;', null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab('data.destroy_ck = destroy_ck.checked;', null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab('data.model_ck = model_ck.checked;', null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab('data.repository_ck = repository_ck.checked;', null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab('data.route_ck = route_ck.checked;', null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab('data.migration_ck = migration_ck.checked;', null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab('data.seeder_ck = seeder_ck.checked;', null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab('data.factory_ck = factory_ck.checked;', null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab('data.testunit_ck = testunit_ck.checked;', null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab('let column_name_group = document.getElementsByClassName("column_name_group");', null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab('let column_type_group = document.getElementsByClassName("column_type_group");', null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab('let arr = [];', null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab('for(let i = 0; i < column_name_group.length; i++){', null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab('let d = {};', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('d.name = column_name_group[i].value;', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('d.type = column_type_group[i].value;', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('arr.push(d);', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('}', null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab('data.columns = arr;', null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab('const res = await fetch(\'{{ route(\'generator.create\') }}\', {', null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab('method: "POST",', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('body: JSON.stringify(data),', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('headers: {', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('\'Content-Type\': \'application/json\',', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('\'Accept\': \'*\',', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('},', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('});', null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab('const response = await res.json();', null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab('//console.log(response);', null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab('Swal.fire({', null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab('position: \'top-end\',', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('icon: \'success\',', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('title: \'Ficheros creados\',', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('showConfirmButton: false,', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('timer: 1500', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('})', null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab('}', null, 1, 2);





        $contents .= HelperFiles::formatLineBreakAndTab('function checkAll() {', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('if(all_ck.checked){', null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab('list_ck.checked = true;', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('show_ck.checked = true;', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('store_ck.checked = true;', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('update_ck.checked = true;', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('destroy_ck.checked = true;', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('model_ck.checked = true;', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('repository_ck.checked = true;', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('route_ck.checked = true;', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('migration_ck.checked = true;', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('seeder_ck.checked = true;', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('factory_ck.checked = true;', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('testunit_ck.checked = true;', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('}else{', null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab('list_ck.checked = false;', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('show_ck.checked = false;', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('store_ck.checked = false;', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('update_ck.checked = false;', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('destroy_ck.checked = false;', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('model_ck.checked = false;', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('repository_ck.checked = false;', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('route_ck.checked = false;', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('migration_ck.checked = false;', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('seeder_ck.checked = false;', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('factory_ck.checked = false;', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('testunit_ck.checked = false;', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('}', null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab('}', null, 1, 2);





        $contents .= HelperFiles::formatLineBreakAndTab('document.querySelector("#save").addEventListener(\'click\', readForm);', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('document.querySelector("#btn_format").addEventListener(\'click\', formatColumns);', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('all_ck.addEventListener(\'click\', checkAll);', null, 1, 2);


        // End Script
        $contents .= HelperFiles::formatLineBreakAndTab('</script>', null, 1, 1);


        $contents .= HelperFiles::formatLineBreakAndTab('</body>', null, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('</html>', null, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('@endif', null, 1);



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
            echo $e->getMessage();
            return false;
        }



    }




    /**
     * @param $path
     * @return void
     */
    private function createController($path)
    {


        $contents = HelperFiles::formatLineBreakAndTab('<?php', null, 2);

        $contents .= HelperFiles::formatLineBreakAndTab('namespace App\\Http\\Controllers\\Generator;', null, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('use App\\Http\\Controllers\\Controller;', null, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('use Illuminate\\Http\\Request;', null, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('use Infinito\\LaravelCrudApiGenerator\\Generator;', null, 2);

        $contents .= HelperFiles::formatLineBreakAndTab('class GeneratorController extends Controller', null, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('{', null, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('public function __invoke(Request $request)', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('{', null, 2, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('$this->validate($request, [', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('\'table_singular\' => \'required\',', null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab('\'table_plural\' => \'required\',', null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab('\'columns\' => \'required\',', null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab('\'relation_class\' => \'required\',', null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab('\'relation_type\' => \'required\',', null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab('\'name_space\' => \'required\',', null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab('\'template_type\' => \'required\',', null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab(']);', null, 2, 2);


        $contents .= HelperFiles::formatLineBreakAndTab('$tableSingular = $request->table_singular;', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('$tablePlural = $request->table_plural;', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('$relationClass = $request->relation_class;', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('$relationType = $request->relation_type;', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('$templateType = $request->template_type;', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('$nameSpace = $request->name_space;', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('$columns = json_decode(json_encode($request->columns));', null, 2, 2);



        $contents .= HelperFiles::formatLineBreakAndTab('// checkboxes', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('$list_ck = $request->input(\'list_ck\') == \'true\';', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('$show_ck = $request->input(\'show_ck\') == \'true\';', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('$store_ck = $request->input(\'store_ck\') == \'true\';', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('$update_ck = $request->input(\'update_ck\') == \'true\';', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('$destroy_ck = $request->input(\'destroy_ck\') == \'true\';', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('$model_ck = $request->input(\'model_ck\') == \'true\';', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('$repository_ck = $request->input(\'repository_ck\') == \'true\';', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('$route_ck = $request->input(\'route_ck\') == \'true\';', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('$migration_ck = $request->input(\'migration_ck\') == \'true\';', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('$seeder_ck = $request->input(\'seeder_ck\') == \'true\';', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('$factory_ck = $request->input(\'factory_ck\') == \'true\';', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('$testunit_ck = $request->input(\'testunit_ck\') == \'true\';', null, 2, 2);


        $contents .= HelperFiles::formatLineBreakAndTab('try {', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('(new Generator())->__invoke($tableSingular, $tablePlural, $columns, $relationClass, $relationType, $nameSpace, $templateType, $list_ck, $show_ck, $store_ck, $update_ck, $destroy_ck, $model_ck, $repository_ck, $route_ck, $migration_ck, $seeder_ck, $factory_ck, $testunit_ck);', null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab('} catch (\\Exception $e) {', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('return response()->json($e->getMessage());', null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab('}', null, 2, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('return response()->json(\'OK\');', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('}', null, 1, 1);


        $contents .= HelperFiles::formatLineBreakAndTab('}', null, 1);



        try {

            if(!file_exists($path)){
                mkdir($path, 0777, true);
            }
            // Write File
            $fh = fopen($path . '/GeneratorController.php', 'w+') or die("Error open file: GeneratorController.php");
            fwrite($fh, $contents)or die("Error write file: GeneratorController.php" );
            fclose($fh);

            return;

        }catch (\Exception $e){
            echo $e->getMessage();
            return;
        }


    }


}
