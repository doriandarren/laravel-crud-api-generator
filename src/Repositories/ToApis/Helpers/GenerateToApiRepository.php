<?php

namespace Infinito\LaravelCrudApiGenerator\Repositories\ToApis\Helpers;

use Infinito\LaravelCrudApiGenerator\Enums\EnumFolderToApi;
use Infinito\LaravelCrudApiGenerator\Helpers\HelperFiles;

class GenerateToApiRepository
{


    /**
     * @param $tableSingular
     * @param $tablePlural
     * @param $columns
     * @param $nameSpace
     * @param $templateType
     * @param $path
     * @return bool
     */
    public function __invoke($tableSingular, $tablePlural, $columns, $nameSpace, $templateType, $path): bool
    {

        $classNameSingularUp = ucwords($tableSingular);
        $classNamePluralUp = ucwords($tablePlural);
        $contents = '';



        //Convert to example_class
        $arr = preg_split('/(?=[A-Z])/',$tableSingular);
        $tableNameWithGuion = '';
        for($i=0; $i < count($arr); $i++){
            if($i == 0){
                $tableNameWithGuion = $arr[0];
            }else{
                $tableNameWithGuion .= '_'.strtolower($arr[$i]);
            }
        }


        /**
         * Header
         */
        $contents .= HelperFiles::formatLineBreakAndTab("<?php", null, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('namespace App\Repositories\\' . $classNamePluralUp . ';', null, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('use App\\Enums\\EnumApiSetup;', null, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('use App\\Models\\'.$classNamePluralUp .'\\' . $classNameSingularUp . ';', null, 3);



        $contents .= HelperFiles::formatLineBreakAndTab('class '. $classNameSingularUp .'Repository', null, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('{', null, 2);


        /**
         * List
         */
        $contents .= HelperFiles::formatLineBreakAndTab('/**', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('* By Admin', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('* @return mixed', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('*/', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('public function list(): mixed', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('{', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('return '. $classNameSingularUp .'::latest()', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('->limit(EnumApiSetup::QUERY_LIMIT)', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('->get();', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('}', null, 2, 1);




        /**
         * List By Manager
         */
        $contents .= HelperFiles::formatLineBreakAndTab('/**', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('* By Manager', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('* @param $' . EnumFolderToApi::USE_TO_COMPANY, null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('* @return mixed', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('*/', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('public function list' . EnumFolderToApi::AUTH_BY_MANAGER . '($'.EnumFolderToApi::USE_TO_COMPANY.'): mixed', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('{', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('return '. $classNameSingularUp .'::where(\''.EnumFolderToApi::USE_TO_COMPANY.'\', $' . EnumFolderToApi::USE_TO_COMPANY . ')', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('->latest()', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('->limit(EnumApiSetup::QUERY_LIMIT)', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('->get();', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('}', null, 2, 1);





        /**
         * List By User
         */
        $contents .= HelperFiles::formatLineBreakAndTab('/**', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('* By User', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('* @param $' . EnumFolderToApi::USE_TO_COMPANY, null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('* @param $' . EnumFolderToApi::USE_TO_ROLE, null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('* @return mixed', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('*/', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('public function list' . EnumFolderToApi::AUTH_BY_USER . '($'.EnumFolderToApi::USE_TO_COMPANY . ', ' . '$'.EnumFolderToApi::USE_TO_ROLE.'): mixed', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('{', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('return '. $classNameSingularUp .'::where(\''.EnumFolderToApi::USE_TO_ROLE.'\', $' . EnumFolderToApi::USE_TO_ROLE . ')', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('->where(\''.EnumFolderToApi::USE_TO_COMPANY.'\', $' . EnumFolderToApi::USE_TO_COMPANY . ')', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('->latest()', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('->limit(EnumApiSetup::QUERY_LIMIT)', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('->get();', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('}', null, 2, 1);





        /**
         * List By Driver
         */
//        $contents .= HelperFiles::formatLineBreakAndTab('/**', null, 1, 1);
//        $contents .= HelperFiles::formatLineBreakAndTab('* By Driver', null, 1, 1);
//        $contents .= HelperFiles::formatLineBreakAndTab('* @param $' . EnumFolderToApi::USE_TO_COMPANY, null, 1, 1);
//        $contents .= HelperFiles::formatLineBreakAndTab('* @return mixed', null, 1, 1);
//        $contents .= HelperFiles::formatLineBreakAndTab('*/', null, 1, 1);
//        $contents .= HelperFiles::formatLineBreakAndTab('public function list' . EnumFolderToApi::AUTH_BY_DRIVER . '($'.EnumFolderToApi::USE_TO_COMPANY.'): mixed', null, 1, 1);
//        $contents .= HelperFiles::formatLineBreakAndTab('{', null, 1, 1);
//        $contents .= HelperFiles::formatLineBreakAndTab('return '. $classNameSingularUp .'::where(\''.EnumFolderToApi::USE_TO_COMPANY.'\', $' . EnumFolderToApi::USE_TO_COMPANY . ')', null, 1, 2);
//        $contents .= HelperFiles::formatLineBreakAndTab('->latest()', null, 1, 5);
//        $contents .= HelperFiles::formatLineBreakAndTab('->limit(EnumApiSetup::QUERY_LIMIT)', null, 1, 5);
//        $contents .= HelperFiles::formatLineBreakAndTab('->get();', null, 1, 5);
//        $contents .= HelperFiles::formatLineBreakAndTab('}', null, 2, 1);
//








        /**
         * Paginate
         */
//        $contents .= HelperFiles::formatLineBreakAndTab('/**', null, 1, 1);
//        $contents .= HelperFiles::formatLineBreakAndTab('* @param $filter', null, 1, 1);
//        $contents .= HelperFiles::formatLineBreakAndTab('* @return mixed', null, 1, 1);
//        $contents .= HelperFiles::formatLineBreakAndTab('*/', null, 1, 1);
//        $contents .= HelperFiles::formatLineBreakAndTab('public function listPaginate($filter = null): mixed', null, 1, 1);
//        $contents .= HelperFiles::formatLineBreakAndTab('{', null, 1, 1);
//        $contents .= HelperFiles::formatLineBreakAndTab('if($filter){', null, 1, 2);
//        $contents .= HelperFiles::formatLineBreakAndTab('return '. $classNameSingularUp .'::when($filter, function ($q) use ($filter) {', null, 1, 3);
//
//        for($i=0; $i<count($columns); $i++){
//            if($i == 0){
//
//                $q = '$q->where(\''.$columns[$i]->name.'\', \'like\', "%{$filter}%")';
//
//                if(count($columns) == 1){
//                    $q .= ';';
//                }
//
//                $contents .= HelperFiles::formatLineBreakAndTab($q, null, 1, 4);
//
//            }else if((count($columns) -1 ) == $i){
//                $contents .= HelperFiles::formatLineBreakAndTab('->orWhere(\''.$columns[$i]->name.'\', \'like\', "%{$filter}%");', null, 1, 5);
//            }else{
//                $contents .= HelperFiles::formatLineBreakAndTab('->orWhere(\''.$columns[$i]->name.'\', \'like\', "%{$filter}%")', null, 1, 5);
//            }
//        }
//
//        $contents .= HelperFiles::formatLineBreakAndTab('})->latest()->paginate(EnumSettingPaginate::PER_PAGE);', null, 1, 3);
//        $contents .= HelperFiles::formatLineBreakAndTab('}else{', null, 1, 2);
//        $contents .= HelperFiles::formatLineBreakAndTab('return '. $classNameSingularUp .'::latest()->paginate(EnumSettingPaginate::PER_PAGE);', null, 1, 3);
//        $contents .= HelperFiles::formatLineBreakAndTab('}', null, 1, 2);
//        $contents .= HelperFiles::formatLineBreakAndTab('}', null, 2, 1);




        /**
         * Paginate by User
         */
//        $contents .= HelperFiles::formatLineBreakAndTab('/**', null, 1, 1);
//        $contents .= HelperFiles::formatLineBreakAndTab('* @param $' . EnumFolderToApi::USE_TO_ROLE, null, 1, 1);
//        $contents .= HelperFiles::formatLineBreakAndTab('* @param $filter', null, 1, 1);
//        $contents .= HelperFiles::formatLineBreakAndTab('* @return mixed', null, 1, 1);
//        $contents .= HelperFiles::formatLineBreakAndTab('*/', null, 1, 1);
//        $contents .= HelperFiles::formatLineBreakAndTab('public function listPaginate' . EnumFolderToApi::AUTH_BY_USER . '($'.EnumFolderToApi::USE_TO_ROLE.', $filter = null): mixed', null, 1, 1);
//        $contents .= HelperFiles::formatLineBreakAndTab('{', null, 1, 1);
//        $contents .= HelperFiles::formatLineBreakAndTab('if($filter){', null, 1, 2);
//        $contents .= HelperFiles::formatLineBreakAndTab('return '. $classNameSingularUp .'::when($filter, function ($q) use ($filter) {', null, 1, 3);
//
//        for($i=0; $i<count($columns); $i++){
//            if($i == 0){
//                $q = '$q->where(\''.$columns[$i]->name.'\', \'like\', "%{$filter}%")';
//
//                if(count($columns) == 1){
//                    $q .= ';';
//                }
//
//                $contents .= HelperFiles::formatLineBreakAndTab($q, null, 1, 4);
//            }else if((count($columns) -1 ) == $i){
//                $contents .= HelperFiles::formatLineBreakAndTab('->orWhere(\''.$columns[$i]->name.'\', \'like\', "%{$filter}%");', null, 1, 5);
//            }else{
//                $contents .= HelperFiles::formatLineBreakAndTab('->orWhere(\''.$columns[$i]->name.'\', \'like\', "%{$filter}%")', null, 1, 5);
//            }
//        }
//
//        $contents .= HelperFiles::formatLineBreakAndTab('})->where(\'employee_id\', $employee_id)->latest()->paginate(EnumSettingPaginate::PER_PAGE);', null, 1, 3);
//        $contents .= HelperFiles::formatLineBreakAndTab('}else{', null, 1, 2);
//        $contents .= HelperFiles::formatLineBreakAndTab('return '. $classNameSingularUp .'::where(\''.EnumFolderToApi::USE_TO_ROLE.'\', $'.EnumFolderToApi::USE_TO_ROLE.')', null, 1, 3);
//        $contents .= HelperFiles::formatLineBreakAndTab('->latest()', null, 1, 7);
//        $contents .= HelperFiles::formatLineBreakAndTab('->paginate(EnumSettingPaginate::PER_PAGE);', null, 1, 7);
//        $contents .= HelperFiles::formatLineBreakAndTab('}', null, 1, 2);
//        $contents .= HelperFiles::formatLineBreakAndTab('}', null, 2, 1);



        /**
         * Show
         */
        $contents .= HelperFiles::formatLineBreakAndTab('/**', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('* @param $id', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('* @return mixed', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('*/', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('public function show($id): mixed', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('{', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('return '. $classNameSingularUp .'::where(\'id\', $id)->first();', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('}', null, 2, 1);



        /**
         * Show By Manager
         */
        $contents .= HelperFiles::formatLineBreakAndTab('/**', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('* @param $' .EnumFolderToApi::USE_TO_COMPANY, null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('* @param $id', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('* @return mixed', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('*/', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('public function show' . EnumFolderToApi::AUTH_BY_MANAGER . '($'.EnumFolderToApi::USE_TO_COMPANY.', $id): mixed', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('{', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('return '. $classNameSingularUp .'::where(\'id\', $id)', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('->where(\''.EnumFolderToApi::USE_TO_COMPANY.'\', $'.EnumFolderToApi::USE_TO_COMPANY.')', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('->first();', null, 2, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('}', null, 2, 1);




        /**
         * Show By User
         */
        $contents .= HelperFiles::formatLineBreakAndTab('/**', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('* @param $' .EnumFolderToApi::USE_TO_ROLE, null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('* @param $id', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('* @return mixed', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('*/', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('public function show' . EnumFolderToApi::AUTH_BY_USER . '($'.EnumFolderToApi::USE_TO_ROLE.', $id): mixed', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('{', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('return '. $classNameSingularUp .'::where(\'id\', $id)', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('->where(\''.EnumFolderToApi::USE_TO_ROLE.'\', $'.EnumFolderToApi::USE_TO_ROLE.')', null, 1, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('->first();', null, 2, 5);
        $contents .= HelperFiles::formatLineBreakAndTab('}', null, 2, 1);




        /**
         * Show By Driver
         */
//        $contents .= HelperFiles::formatLineBreakAndTab('/**', null, 1, 1);
//        $contents .= HelperFiles::formatLineBreakAndTab('* @param $' .EnumFolderToApi::USE_TO_COMPANY, null, 1, 1);
//        $contents .= HelperFiles::formatLineBreakAndTab('* @param $id', null, 1, 1);
//        $contents .= HelperFiles::formatLineBreakAndTab('* @return mixed', null, 1, 1);
//        $contents .= HelperFiles::formatLineBreakAndTab('*/', null, 1, 1);
//        $contents .= HelperFiles::formatLineBreakAndTab('public function show' . EnumFolderToApi::AUTH_BY_DRIVER . '($'.EnumFolderToApi::USE_TO_COMPANY.', $id): mixed', null, 1, 1);
//        $contents .= HelperFiles::formatLineBreakAndTab('{', null, 1, 1);
//        $contents .= HelperFiles::formatLineBreakAndTab('return '. $classNameSingularUp .'::where(\'id\', $id)', null, 1, 2);
//        $contents .= HelperFiles::formatLineBreakAndTab('->where(\''.EnumFolderToApi::USE_TO_COMPANY.'\', $'.EnumFolderToApi::USE_TO_COMPANY.')', null, 1, 5);
//        $contents .= HelperFiles::formatLineBreakAndTab('->first();', null, 2, 5);
//        $contents .= HelperFiles::formatLineBreakAndTab('}', null, 2, 1);





        /**
         * Store
         */
        $contents .= HelperFiles::formatLineBreakAndTab('/**', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('* @param $data', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('* @return ' . $classNameSingularUp, null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('*/', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('public function store($data): ' . $classNameSingularUp, null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('{', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('$objNew = new '. $classNameSingularUp ."();",null,1,2);

        foreach($columns as $col){
            $contents .= HelperFiles::formatLineBreakAndTab('$objNew->'.$col->name.' = $data->'.$col->name.';',null,1,2);
        }

        $contents .= HelperFiles::formatLineBreakAndTab('$objNew->save();',null,1,2);
        $contents .= HelperFiles::formatLineBreakAndTab('return $objNew;',null,1,2);
        $contents .= HelperFiles::formatLineBreakAndTab('}', null, 2, 1);



        /**
         * Update
         */
        $contents .= HelperFiles::formatLineBreakAndTab('/**', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('* @param $id', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('* @param $data', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('* @return mixed', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('*/', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('public function update($id, $data): mixed', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('{', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('if(is_array($data)){', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('$obj = json_decode(json_encode($data), FALSE);', null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab('}else{', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('$obj = $data;', null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab('}', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('$objOld = ' . $classNameSingularUp . '::find($id);', null, 2, 2);

        foreach($columns as $col){
            $contents .= HelperFiles::formatLineBreakAndTab('if(isset($obj->'.$col->name.')){',null,1,2);
            $contents .= HelperFiles::formatLineBreakAndTab('if($obj->'.$col->name.' != \'\' && !empty($obj->'.$col->name.')){',null,1,3);
            $contents .= HelperFiles::formatLineBreakAndTab('$objOld->'.$col->name.' = $obj->'.$col->name.';',null,1,4);
            $contents .= HelperFiles::formatLineBreakAndTab('}',null,1,3);
            $contents .= HelperFiles::formatLineBreakAndTab('}',null,2,2);
        }

        $contents .= HelperFiles::formatLineBreakAndTab('$objOld->save();',null,2,2);
        $contents .= HelperFiles::formatLineBreakAndTab('return $objOld;',null,2,2);
        $contents .= HelperFiles::formatLineBreakAndTab('}', null, 2, 1);





        /**
         * Destroy
         */
        $contents .= HelperFiles::formatLineBreakAndTab('/**', null, 1, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('* @param $id', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('* @return bool', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('*/', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('public function destroy($id): bool', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('{', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('$data = '. $classNameSingularUp .'::find($id);', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('$data->delete();', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('return true;', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('}', null, 3, 1);




        /**
         * Create an object
         */
        $contents .= HelperFiles::formatLineBreakAndTab('/** ',null,1,1);
        $contents .= HelperFiles::formatLineBreakAndTab('* Template',null,1,1);
        foreach ($columns as $col) {
            $contents .= HelperFiles::formatLineBreakAndTab(' * @param $'.$col->name,null,1,1);
        }
        $contents .= HelperFiles::formatLineBreakAndTab(' * @return '.$classNameSingularUp,null,1,1);
        $contents .= HelperFiles::formatLineBreakAndTab(' */',null,1,1);

        $str = '';
        for($i=0; $i<count($columns); $i++){
            if((count($columns) -1 ) == $i){
                // The end
                $str .= '$'.$columns[$i]->name;
            }else{
                $str .= '$'.$columns[$i]->name.', ';
            }
        }

        $contents .= HelperFiles::formatLineBreakAndTab('public function set'.$classNameSingularUp.'(' . trim($str) . '): '.$classNameSingularUp,null,1,1);
        $contents .= HelperFiles::formatLineBreakAndTab('{',null,1,1);
        $contents .= HelperFiles::formatLineBreakAndTab('$obj = new '.$classNameSingularUp.'();',null,1,2);

        foreach ($columns as $col) {
            $contents .= HelperFiles::formatLineBreakAndTab('$obj->'.$col->name.' = $'.$col->name.';',null,1,2);
        }

        $contents .= HelperFiles::formatLineBreakAndTab('return $obj;',null,1,2);
        $contents .= HelperFiles::formatLineBreakAndTab('}',null,2,1);



        /**
         * End Class
         */
        $contents .= HelperFiles::formatLineBreakAndTab('}', null, 1);




        try {

            if(!file_exists($path)){
                mkdir($path, 0777, true);
            }
            // Write File
            $fh = fopen($path . '/' . $classNameSingularUp . 'Repository.php', 'w+') or die("Error open file: " . $classNameSingularUp . 'Repository.php');
            fwrite($fh, $contents)or die("Error write file: " . $classNameSingularUp . 'Repository.php');
            fclose($fh);

            return true;

        }catch (\Exception $e){
            return false;
        }



    }

}
