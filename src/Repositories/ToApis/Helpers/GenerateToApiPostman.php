<?php

namespace Infinito\LaravelCrudApiGenerator\Repositories\ToApis\Helpers;

use Infinito\LaravelCrudApiGenerator\Enums\EnumFolderToApi;
use Infinito\LaravelCrudApiGenerator\Helpers\HelperFiles;

class GenerateToApiPostman
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
     * @return bool
     */
    public function __invoke($tableSingular, $tablePlural, $columns, $nameSpace, $templateType, $classNameSingularUp,
                             $classNamePluralUp, $tableNameWithGuion, $tableNameWithGuionPlural, $relationClass,
                             $relationType, $path): bool
    {

        $contents = HelperFiles::formatLineBreakAndTab("{", null, 2);

        $contents .= HelperFiles::formatLineBreakAndTab('"info": {', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('"_postman_id": "1e8ef847-456f-4806-9ab0-c4b861fe675d",', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('"name": "'.$classNameSingularUp.'Export",', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('"schema": "https://schema.getpostman.com/json/collection/v2.1.0/collection.json",', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('"_exporter_id": "5599797"', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('},', null, 1, 1);

        $contents .= HelperFiles::formatLineBreakAndTab('"item": [', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('{', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('"name": "' . $classNamePluralUp . '",', null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab('"item": [', null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab('{', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('"name": "List",', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('"protocolProfileBehavior": {', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('"disableBodyPruning": true', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('},', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('"request": {', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('"method": "GET",', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('"header": [', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('{', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('"key": "Accept",', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab('"value": "application/json",', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab('"type": "text"', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab('},', null, 1, 7);



        // List
        $contents .= HelperFiles::formatLineBreakAndTab('{', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('"key": "Authorization",', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab('"value": "Bearer {{token_api}}",', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab('"type": "text"', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab('}', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('],', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('"body": {', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('"mode": "formdata",', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('"formdata": []', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('},', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('"url": {', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('"raw": "{{base_url}}' . str_replace("_", "-", $tableNameWithGuionPlural) . '/list",', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('"host": [', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('"{{base_url}}' . str_replace("_", "-", $tableNameWithGuionPlural) . '"', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab('],', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('"path": [', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('"list"', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab(']', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('}', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('},', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('"response": []', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('},', null, 1, 4);


        // List paginate
        $contents .= HelperFiles::formatLineBreakAndTab('{', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('"name": "List paginate",', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('"protocolProfileBehavior": {', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('"disableBodyPruning": true', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('},', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('"request": {', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('"method": "GET",', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('"header": [', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('{', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('"key": "Accept",', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab('"value": "application/json",', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab('"type": "text"', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab('},', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('{', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('"key": "Authorization",', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab('"value": "Bearer {{token_api}}",', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab('"type": "text"', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab('}', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('],', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('"body": {', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('"mode": "formdata",', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('"formdata": []', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('},', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('"url": {', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('"raw": "{{base_url}}' . str_replace("_", "-", $tableNameWithGuionPlural) . '/list/paginate",', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('"host": [', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('"{{base_url}}' . str_replace("_", "-", $tableNameWithGuionPlural) . '"', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab('],', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('"path": [', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('"list",', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab('"paginate"', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab(']', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('}', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('},', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('"response": []', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('},', null, 1, 4);



        // List paginate Filter
        $contents .= HelperFiles::formatLineBreakAndTab('{', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('"name": "List paginate with Filter",', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('"protocolProfileBehavior": {', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('"disableBodyPruning": true', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('},', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('"request": {', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('"method": "GET",', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('"header": [', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('{', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('"key": "Accept",', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab('"value": "application/json",', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab('"type": "text"', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab('},', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('{', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('"key": "Authorization",', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab('"value": "Bearer {{token_api}}",', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab('"type": "text"', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab('}', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('],', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('"body": {', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('"mode": "formdata",', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('"formdata": []', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('},', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('"url": {', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('"raw": "{{base_url}}' . str_replace("_", "-", $tableNameWithGuionPlural) . '/list/paginate?filter=0f609",', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('"host": [', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('"{{base_url}}' . str_replace("_", "-", $tableNameWithGuionPlural) . '"', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab('],', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('"path": [', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('"list",', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab('"paginate"', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab('],', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('"query": [', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('{', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab('"key": "filter",', null, 1, 9);
        $contents .= HelperFiles::formatLineBreakAndTab('"value": "0f609432jap0167"', null, 1, 9);
        $contents .= HelperFiles::formatLineBreakAndTab('}', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab(']', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('}', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('},', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('"response": []', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('},', null, 1, 4);

        // Show
        $contents .= HelperFiles::formatLineBreakAndTab('{', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('"name": "Show",', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('"protocolProfileBehavior": {', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('"disableBodyPruning": true', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('},', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('"request": {', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('"method": "GET",', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('"header": [', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('{', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('"key": "Accept",', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab('"value": "application/json",', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab('"type": "text"', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab('},', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('{', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('"key": "Authorization",', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab('"value": "Bearer {{token_api}}",', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab('"type": "text"', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab('}', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('],', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('"body": {', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('"mode": "formdata",', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('"formdata": []', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('},', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('"url": {', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('"raw": "{{base_url}}' . str_replace("_", "-", $tableNameWithGuionPlural) . '/show/1",', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('"host": [', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('"{{base_url}}' . str_replace("_", "-", $tableNameWithGuionPlural) . '"', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab('],', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('"path": [', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('"show",', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab('"1"', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab(']', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('}', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('},', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('"response": []', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('},', null, 1, 4);



        // Store
        $contents .= HelperFiles::formatLineBreakAndTab('{', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('"name": "Store",', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('"request": {', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('"method": "POST",', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('"header": [', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('{', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('"key": "Accept",', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab('"value": "application/json",', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab('"type": "text"', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab('},', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('{', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('"key": "Authorization",', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab('"value": "Bearer {{token_api}}",', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab('"type": "text"', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab('}', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('],', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('"body": {', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('"mode": "formdata",', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('"formdata": [', null, 1, 7);

        for($i=0; $i<count($columns); $i++){

            $contents .= HelperFiles::formatLineBreakAndTab('{', null, 1, 8);
            $contents .= HelperFiles::formatLineBreakAndTab('"key": "'.$columns[$i]->name.'",', null, 1, 9);

            // check "_id"
            if(HelperFiles::isIdInsideWord($columns[$i]->name)){
                $contents .= HelperFiles::formatLineBreakAndTab('"value": "1",', null, 1, 9);
            }else{
                $contents .= HelperFiles::formatLineBreakAndTab('"value": "New '.$columns[$i]->name.'",', null, 1, 9);
            }

            $contents .= HelperFiles::formatLineBreakAndTab('"type": "text"', null, 1, 9);
            $contents .= HelperFiles::formatLineBreakAndTab(($i < (count($columns)) - 1) ? '},' : '}', null, 1, 8);

        }

        $contents .= HelperFiles::formatLineBreakAndTab(']', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('},', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('"url": {', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('"raw": "{{base_url}}' . str_replace("_", "-", $tableNameWithGuionPlural) . '/store",', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('"host": [', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('"{{base_url}}' . str_replace("_", "-", $tableNameWithGuionPlural) . '"', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab('],', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('"path": [', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('"store"', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab(']', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('}', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('},', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('"response": []', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('},', null, 1, 4);






        // Update
        $contents .= HelperFiles::formatLineBreakAndTab('{', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('"name": "Update",', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('"request": {', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('"method": "PUT",', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('"header": [', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('{', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('"key": "Accept",', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab('"value": "application/json",', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab('"type": "text"', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab('},', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('{', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('"key": "Authorization",', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab('"value": "Bearer {{token_api}}",', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab('"type": "text"', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab('}', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('],', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('"body": {', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('"mode": "urlencoded",', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('"urlencoded": [', null, 1, 7);

        for($i=0; $i<count($columns); $i++){

            $contents .= HelperFiles::formatLineBreakAndTab('{', null, 1, 8);
            $contents .= HelperFiles::formatLineBreakAndTab('"key": "'.$columns[$i]->name.'",', null, 1, 9);

            // check "_id"
            if(HelperFiles::isIdInsideWord($columns[$i]->name)){
                $contents .= HelperFiles::formatLineBreakAndTab('"value": "1",', null, 1, 9);
            }else{
                $contents .= HelperFiles::formatLineBreakAndTab('"value": "Update '.$columns[$i]->name.'",', null, 1, 9);
            }

            $contents .= HelperFiles::formatLineBreakAndTab('"type": "text"', null, 1, 9);
            $contents .= HelperFiles::formatLineBreakAndTab(($i < (count($columns)) - 1) ? '},' : '}', null, 1, 8);

        }

        $contents .= HelperFiles::formatLineBreakAndTab(']', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('},', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('"url": {', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('"raw": "{{base_url}}' . str_replace("_", "-", $tableNameWithGuionPlural) . '/store",', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('"host": [', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('"{{base_url}}' . str_replace("_", "-", $tableNameWithGuionPlural) . '"', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab('],', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('"path": [', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('"update",', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab('"1"', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab(']', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('}', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('},', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('"response": []', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('},', null, 1, 4);






        // Delete
        $contents .= HelperFiles::formatLineBreakAndTab('{', null, 1, 4);
        $contents .= HelperFiles::formatLineBreakAndTab('"name": "Delete",', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('"request": {', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('"method": "DELETE",', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('"header": [', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('{', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('"key": "Accept",', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab('"value": "application/json",', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab('"type": "text"', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab('},', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('{', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('"key": "Authorization",', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab('"value": "Bearer {{token_api}}",', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab('"type": "text"', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab('}', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('],', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('"url": {', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('"raw": "{{base_url}}' . str_replace("_", "-", $tableNameWithGuionPlural) . '/show/1",', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('"host": [', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('"{{base_url}}' . str_replace("_", "-", $tableNameWithGuionPlural) . '"', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab('],', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('"path": [', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('"delete",', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab('"1"', null, 1, 8);
        $contents .= HelperFiles::formatLineBreakAndTab(']', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('}', null, 1, 6);
        $contents .= HelperFiles::formatLineBreakAndTab('},', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('"response": []', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('}', null, 1, 4);




        // End
        $contents .= HelperFiles::formatLineBreakAndTab(']', null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab('}', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab(']', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('}', null, 1);




        try {

            if(!file_exists($path)){
                mkdir($path, 0777, true);
            }
            // Write File
            $fh = fopen($path . '/' . $classNameSingularUp.'Export.Postman_collection.json', 'w+') or die("Error open file: " . $classNameSingularUp.'Export.Postman_collection.json');
            fwrite($fh, $contents)or die("Error write file: Script.txt");
            fclose($fh);

            return true;

        }catch (\Exception $e){
            return false;
        }


    }


}
