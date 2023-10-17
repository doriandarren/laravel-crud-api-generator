<?php

namespace Infinito\LaravelCrudApiGenerator\Repositories\ToApis\Helpers;

use Infinito\LaravelCrudApiGenerator\Enums\EnumFolderToApi;
use Infinito\LaravelCrudApiGenerator\Helpers\HelperFiles;

class GenerateToApiListController
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

        // Header
        $contents = HelperFiles::formatLineBreakAndTab("<?php", null, 2);

        if($nameSpace !== ''){
            $contents .= HelperFiles::formatLineBreakAndTab('namespace App\Http\Controllers\\' . $nameSpace . '\\' . $classNamePluralUp . ';', null, 2);
        }else{
            $contents .= HelperFiles::formatLineBreakAndTab('namespace App\Http\Controllers\\' . $classNamePluralUp . ';', null, 2);
        }




        // Use
        $contents .= HelperFiles::formatLineBreakAndTab('use Illuminate\Http\JsonResponse;', null, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('use Illuminate\Http\Request;', null, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('use App\Http\Controllers\Controller;', null, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('use App\Repositories\\' . $classNamePluralUp . '\\' . $classNameSingularUp . 'Repository;', null, 2);



        // Begin Class
        $contents .= HelperFiles::formatLineBreakAndTab('class '. $classNameSingularUp . EnumFolderToApi::LIST. 'Controller extends Controller',null,1);
        $contents .= HelperFiles::formatLineBreakAndTab('{',null,2);





        $contents .= HelperFiles::formatLineBreakAndTab('private $repository;',null,1,1);


        $contents .= HelperFiles::formatLineBreakAndTab('public function __construct()',2,1,1);
        $contents .= HelperFiles::formatLineBreakAndTab('{',null,1,1);
        $contents .= HelperFiles::formatLineBreakAndTab('$this->repository = new ' . ucfirst($tableSingular) .'Repository();',null,1,2);
        $contents .= HelperFiles::formatLineBreakAndTab('}',null,2,1);


        // List
        $contents .= HelperFiles::formatLineBreakAndTab('/**',null,1,1);
        $contents .= HelperFiles::formatLineBreakAndTab('* @header Bearer BEARER_AUTH ',null,1,1);
        $contents .= HelperFiles::formatLineBreakAndTab('*',null,1,1);
        $contents .= HelperFiles::formatLineBreakAndTab('* @param Request $request',null,1,1);
        $contents .= HelperFiles::formatLineBreakAndTab('* @return JsonResponse',null,1,1);
        $contents .= HelperFiles::formatLineBreakAndTab('*/',null,1,1);
        $contents .= HelperFiles::formatLineBreakAndTab('public function __invoke(Request $request): JsonResponse',null,1,1);
        $contents .= HelperFiles::formatLineBreakAndTab('{',null,1,1);
        $contents .= HelperFiles::formatLineBreakAndTab('if($this->isAdmin(auth()->user()->roles)){',null,1,2);
        $contents .= HelperFiles::formatLineBreakAndTab('$data = $this->repository->list();',null,1,3);
        $contents .= HelperFiles::formatLineBreakAndTab('}elseif($this->isManager(auth()->user()->roles)){',null,1,2);
        $contents .= HelperFiles::formatLineBreakAndTab('$data = $this->repository->list' . EnumFolderToApi::AUTH_BY_MANAGER . '(auth()->user()->employee->company_id);',null,1,3);
        $contents .= HelperFiles::formatLineBreakAndTab('}else{',null,1,2);
        $contents .= HelperFiles::formatLineBreakAndTab('$data = $this->repository->list' . EnumFolderToApi::AUTH_BY_USER . '(auth()->user()->employee->company_id, auth()->user()->employee->id);',null,1,3);
        $contents .= HelperFiles::formatLineBreakAndTab('}',null,1,2);
        $contents .= HelperFiles::formatLineBreakAndTab('return $this->respondWithData(\'' . $classNamePluralUp . ' list\', $data);',null,1,2);
        $contents .= HelperFiles::formatLineBreakAndTab('}',null,2,1);


        //End Class
        $contents .= HelperFiles::formatLineBreakAndTab('}');




        try {

            if(!file_exists($path)){
                mkdir($path, 0777, true);
            }
            // Write File
            $fh = fopen($path . '/' . $classNameSingularUp . EnumFolderToApi::LIST . 'Controller.php', 'w+') or die("Error open file: " . $classNameSingularUp . EnumFolderToApi::LIST . 'Controller.php');
            fwrite($fh, $contents)or die("Error write file: " . $classNameSingularUp . EnumFolderToApi::LIST . 'Controller.php');
            fclose($fh);

            return true;

        }catch (\Exception $e){
            return false;
        }

    }


}
