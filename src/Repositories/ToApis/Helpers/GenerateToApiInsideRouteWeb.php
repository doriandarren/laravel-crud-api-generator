<?php

namespace Infinito\LaravelCrudApiGenerator\Repositories\ToApis\Helpers;

use Infinito\LaravelCrudApiGenerator\Helpers\HelperFiles;

class GenerateToApiInsideRouteWeb
{


    /**
     * @param $pathRoute
     * @param $pathResources
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
        $str = 'Route::get(\'/generator\', function () { '.PHP_EOL.' return view(\'generator\'); '.PHP_EOL.'});' . PHP_EOL;
        $str .= 'Route::post(\'/generator/create\', [App\Http\Controllers\Generator\GeneratorController::class, \'__invoke\'] )->name(\'generator.create\');';


        $fp = fopen($patWeb, "a+");
        fputs($fp, $str);
        fclose($fp);

    }



    private function createPageForm($path)
    {

        //TODO validar que exista



        // Header
        $contents = HelperFiles::formatLineBreakAndTab('<!DOCTYPE html>', null, 1);


        $contents .= HelperFiles::formatLineBreakAndTab('<html lang="{{ str_replace(\'_\', \'-\', app()->getLocale()) }}">', null, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('<head>', null, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('<meta charset="utf-8">', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('<meta name="viewport" content="width=device-width, initial-scale=1">', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('<title>Generator</title>', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">', null, 1, 1);
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



        // Block
        $contents .= HelperFiles::formatLineBreakAndTab('<div class="grid grid-cols-3 gap-4 mt-10">', null, 1, 3);
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
        $contents .= HelperFiles::formatLineBreakAndTab('value="Api"', null, 1, 6);
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
        $contents .= HelperFiles::formatLineBreakAndTab('</div>', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('</div>', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('</div>', null, 1, 3);




        $contents .= HelperFiles::formatLineBreakAndTab('<div class="px-6 pt-4 pb-2">', null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab('<button', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('class="px-3 py-3 bg-blue-600 text-white font-medium leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('id="save"', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('>', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('Generar', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('</button>', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('</div>', null, 1, 3);



        //END
        $contents .= HelperFiles::formatLineBreakAndTab('</div>', null, 1, 2);

        $contents .= HelperFiles::formatLineBreakAndTab('</div>', null, 1, 1);




        $contents .= HelperFiles::formatLineBreakAndTab('<script>', null, 1, 1);


        $contents .= HelperFiles::formatLineBreakAndTab('let input_format = document.getElementById("input_format");', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('let div_column = document.getElementById("div_column");', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('let table_singular = document.getElementById("table_singular");', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('let table_plural = document.getElementById("table_plural");', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('let columns = document.getElementById("columns");', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('let relation_type_id = document.getElementById("relation_type_id");', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('let relation_class_id = document.getElementById("relation_class_id");', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('let name_space = document.getElementById("name_space");', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('let template_type = document.getElementById("template_type");', null, 3, 2);



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
        $contents .= HelperFiles::formatLineBreakAndTab('console.log(response);', null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab('}', null, 1, 2);



        $contents .= HelperFiles::formatLineBreakAndTab('document.querySelector("#save").addEventListener(\'click\', readForm);', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('document.querySelector("#btn_format").addEventListener(\'click\', formatColumns);', null, 1, 2);


        $contents .= HelperFiles::formatLineBreakAndTab('</script>', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('</body>', null, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('</html>', null, 1);





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
