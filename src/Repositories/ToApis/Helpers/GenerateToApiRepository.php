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
        //$contents .= HelperFiles::formatLineBreakAndTab('use App\Enums\EnumSettingPaginate;', null, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('use App\Models\\'.$classNamePluralUp .'\\' . $classNameSingularUp . ';', null, 3);


        $contents .= HelperFiles::formatLineBreakAndTab('class '. $classNameSingularUp .'Repository', null, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('{', null, 2);


        /**
         * List
         */
        $contents .= HelperFiles::formatLineBreakAndTab('/**', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('* @return mixed', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('*/', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('public function list(): mixed', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('{', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('return '. $classNameSingularUp .'::latest()->get();', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('}', null, 2, 1);


        /**
         * List By User
         */
        $contents .= HelperFiles::formatLineBreakAndTab('/**', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('* @param $' . EnumFolderToApi::USE_TO_ROLE, null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('* @return mixed', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('*/', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('public function list' . EnumFolderToApi::AUTH_BY_USER . '($'.EnumFolderToApi::USE_TO_ROLE.'): mixed', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('{', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('// TODO By User', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('//$q = '. $classNameSingularUp .'::where(\'id\', $' . EnumFolderToApi::USE_TO_ROLE . ')->first();', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('//return $q?->companies;', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('//return [];', null, 2, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('return '. $classNameSingularUp .'::where(\''.EnumFolderToApi::USE_TO_ROLE.'\', $' . EnumFolderToApi::USE_TO_ROLE . ')->latest()->get();', null, 2, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('}', null, 2, 1);




        /**
         * Paginate
         */
        $contents .= HelperFiles::formatLineBreakAndTab('/**', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('* @param $filter', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('* @return mixed', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('*/', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('public function listPaginate($filter = null): mixed', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('{', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('if($filter){', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('return '. $classNameSingularUp .'::when($filter, function ($q) use ($filter) {', null, 1, 3);

        for($i=0; $i<count($columns); $i++){
            if($i == 0){

                $q = '$q->where(\''.$columns[$i]->name.'\', \'like\', "%{$filter}%")';

                if(count($columns) == 1){
                    $q .= ';';
                }

                $contents .= HelperFiles::formatLineBreakAndTab($q, null, 1, 4);

            }else if((count($columns) -1 ) == $i){
                $contents .= HelperFiles::formatLineBreakAndTab('->orWhere(\''.$columns[$i]->name.'\', \'like\', "%{$filter}%");', null, 1, 5);
            }else{
                $contents .= HelperFiles::formatLineBreakAndTab('->orWhere(\''.$columns[$i]->name.'\', \'like\', "%{$filter}%")', null, 1, 5);
            }
        }

        $contents .= HelperFiles::formatLineBreakAndTab('})->latest()->paginate(EnumSettingPaginate::PER_PAGE);', null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab('}else{', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('return '. $classNameSingularUp .'::latest()->paginate(EnumSettingPaginate::PER_PAGE);', null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab('}', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('}', null, 2, 1);




        /**
         * Paginate by User
         */
        $contents .= HelperFiles::formatLineBreakAndTab('/**', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('* @param $' . EnumFolderToApi::USE_TO_ROLE, null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('* @param $filter', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('* @return mixed', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('*/', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('public function listPaginate' . EnumFolderToApi::AUTH_BY_USER . '($'.EnumFolderToApi::USE_TO_ROLE.', $filter = null): mixed', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('{', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('if($filter){', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('return '. $classNameSingularUp .'::when($filter, function ($q) use ($filter) {', null, 1, 3);

        for($i=0; $i<count($columns); $i++){
            if($i == 0){
                $contents .= HelperFiles::formatLineBreakAndTab('$q->where(\''.$columns[$i]->name.'\', \'like\', "%{$filter}%")', null, 1, 4);
            }else if((count($columns) -1 ) == $i){
                $contents .= HelperFiles::formatLineBreakAndTab('->orWhere(\''.$columns[$i]->name.'\', \'like\', "%{$filter}%");', null, 1, 5);
            }else{
                $contents .= HelperFiles::formatLineBreakAndTab('->orWhere(\''.$columns[$i]->name.'\', \'like\', "%{$filter}%")', null, 1, 5);
            }
        }

        $contents .= HelperFiles::formatLineBreakAndTab('})->where(\'employee_id\', $employee_id)->latest()->paginate(EnumSettingPaginate::PER_PAGE);', null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab('}else{', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('return '. $classNameSingularUp .'::where(\''.EnumFolderToApi::USE_TO_ROLE.'\', $'.EnumFolderToApi::USE_TO_ROLE.')', null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab('->latest()', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('->paginate(EnumSettingPaginate::PER_PAGE);', null, 1, 7);
        $contents .= HelperFiles::formatLineBreakAndTab('}', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('}', null, 2, 1);



        /**
         * Show
         */
        $contents .= HelperFiles::formatLineBreakAndTab('/**', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('* @param $id', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('* @return mixed', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('*/', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('public function show($id): mixed', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('{', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('return '. $classNameSingularUp .'::find($id);', null, 1, 2);
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
        $contents .= HelperFiles::formatLineBreakAndTab('->where(\''.EnumFolderToApi::USE_TO_ROLE.'\', $'.EnumFolderToApi::USE_TO_ROLE.')', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('->first();', null, 2, 2);

        $contents .= HelperFiles::formatLineBreakAndTab('// TODO logic here', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('//$q = '. $classNameSingularUp .'::with([\'company\'])', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('//->where(\'company_id\', $id)', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('//->where(\'user_id\', $user_id)', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('//->first();', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('//return $q?->company;', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('}', null, 2, 1);




        /**
         * Store
         */
        $contents .= HelperFiles::formatLineBreakAndTab('/**', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('* @param $attribute', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('* @return ' . $classNameSingularUp, null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('*/', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('public function store($attribute): ' . $classNameSingularUp, null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('{', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab("$".$tableSingular."New = new ". $classNameSingularUp ."();",null,1,2);

        foreach($columns as $col){
            $contents .= HelperFiles::formatLineBreakAndTab('$'.$tableSingular.'New->'.$col->name.' = $attribute->'.$col->name.';',null,1,2);
        }

        $contents .= HelperFiles::formatLineBreakAndTab("$" . $tableSingular . "New->save();",null,1,2);
        $contents .= HelperFiles::formatLineBreakAndTab("return $" . $tableSingular . "New;",null,1,2);
        $contents .= HelperFiles::formatLineBreakAndTab('}', null, 2, 1);



        /**
         * Store By User
         */
        $contents .= HelperFiles::formatLineBreakAndTab('/**', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('* @param $' . EnumFolderToApi::USE_TO_ROLE, null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('* @param $attribute', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('* @return ' . $classNameSingularUp, null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('*/', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('public function store' . EnumFolderToApi::AUTH_BY_USER . '($'. EnumFolderToApi::USE_TO_ROLE.', $attribute): '. $classNameSingularUp, null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('{', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab("$".$tableSingular."New = new ". $classNameSingularUp ."();",null,1,2);
        $contents .= HelperFiles::formatLineBreakAndTab('// TODO --->>> refactor to $' . EnumFolderToApi::USE_TO_ROLE,null,1,2);
        $contents .= HelperFiles::formatLineBreakAndTab('// $'.$tableSingular.'New->' . EnumFolderToApi::USE_TO_ROLE.' = $' . EnumFolderToApi::USE_TO_ROLE . ';',null,1,2);

        foreach($columns as $col){
            $contents .= HelperFiles::formatLineBreakAndTab('$'.$tableSingular.'New->'.$col->name.' = $attribute->'.$col->name.';',null,1,2);
        }

        $contents .= HelperFiles::formatLineBreakAndTab("return $" . $tableSingular . "New;",null,2,2);
        $contents .= HelperFiles::formatLineBreakAndTab('}', null, 2, 1);




        /**
         * Update
         */
        $contents .= HelperFiles::formatLineBreakAndTab('/**', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('* @param $id', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('* @param $attributes', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('* @return mixed', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('*/', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('public function update($id, $attributes): mixed', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('{', null, 1, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('if(is_array($attributes)){', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('$' . $tableSingular . ' = json_decode(json_encode($attributes), FALSE);', null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab('}else{', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('$' . $tableSingular . ' = $attributes;', null, 1, 3);
        $contents .= HelperFiles::formatLineBreakAndTab('}', null, 1, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('$' . $tableSingular . 'Old = ' . $classNameSingularUp . '::find($id);', null, 2, 2);

        foreach($columns as $col){
            $contents .= HelperFiles::formatLineBreakAndTab('if(isset($'.$tableSingular.'->'.$col->name.')){',null,1,2);
            $contents .= HelperFiles::formatLineBreakAndTab('if($'.$tableSingular.'->'.$col->name.' != \'\' && !empty($'. $tableSingular .'->'.$col->name.')){',null,1,3);
            $contents .= HelperFiles::formatLineBreakAndTab('$'.$tableSingular.'Old->'.$col->name.' = $'.$tableSingular.'->'.$col->name.';',null,1,4);
            $contents .= HelperFiles::formatLineBreakAndTab('}',null,1,3);
            $contents .= HelperFiles::formatLineBreakAndTab('}',null,2,2);
        }

        $contents .= HelperFiles::formatLineBreakAndTab('$'. $tableSingular .'Old->save();',null,2,2);
        $contents .= HelperFiles::formatLineBreakAndTab('return $'.$tableSingular.'Old;',null,2,2);
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
        $contents .= HelperFiles::formatLineBreakAndTab('public function set'.$classNameSingularUp.'(',null,null,1);


        $str = '';
        for($i=0; $i<count($columns); $i++){
            if((count($columns) -1 ) == $i){
                // The end
                $str .= '$'.$columns[$i]->name;
            }else{
                $str .= '$'.$columns[$i]->name.', ';
            }
        }

        $contents .= HelperFiles::formatLineBreakAndTab(trim($str) . '): '.$classNameSingularUp,null,1,1);
        $contents .= HelperFiles::formatLineBreakAndTab('{',null,1,1);
        $contents .= HelperFiles::formatLineBreakAndTab('$'.$tableSingular.' = new '.$classNameSingularUp.'();',null,1,2);

        foreach ($columns as $col) {
            $contents .= HelperFiles::formatLineBreakAndTab('$'.$tableSingular.'->'.$col->name.' = $'.$col->name.';',null,1,2);
        }

        $contents .= HelperFiles::formatLineBreakAndTab('return $'.$tableSingular.';',null,1,2);
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







        /**
         * Save File
         */
//        $storagePath  = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix();
//        Storage::makeDirectory(EnumFolderMain::PATH_STORAGE . '/' . EnumFolderToApi::PATH_STORAGE . '/' .  $classNamePluralUp . '/' . EnumFolderToApi::PATH_FOLDER_REPOSITORY);
//
//        File::put($storagePath . EnumFolderMain::PATH_STORAGE. '/' . EnumFolderToApi::PATH_STORAGE  . '/' .  $classNamePluralUp . '/' . EnumFolderToApi::PATH_FOLDER_REPOSITORY .  '/'. $classNameSingularUp .'Repository.php', $contents);
//
//        return true;

    }




}
