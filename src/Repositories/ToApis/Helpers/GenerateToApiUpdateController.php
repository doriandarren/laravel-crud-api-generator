<?php

namespace Infinito\LaravelCrudApiGenerator\Repositories\ToApis\Helpers;

use Infinito\LaravelCrudApiGenerator\Enums\EnumFolderToApi;
use Infinito\LaravelCrudApiGenerator\Helpers\HelperFiles;

class GenerateToApiUpdateController
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


        //Header
        $contents = HelperFiles::formatLineBreakAndTab("<?php", null, 2);
        $contents .= HelperFiles::formatLineBreakAndTab('namespace App\Http\Controllers\\' . $classNamePluralUp . ';', null, 2);

        // Use
        $contents .= HelperFiles::formatLineBreakAndTab('use App\Models\\' . $classNamePluralUp . '\\' . $classNameSingularUp . ';', null, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('use Illuminate\Http\JsonResponse;', null, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('use Illuminate\Http\Request;', null, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('use App\Http\Controllers\Controller;', null, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('use Illuminate\Support\Facades\Validator;', null, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('use Illuminate\Validation\Rule;', null, 1);
        $contents .= HelperFiles::formatLineBreakAndTab('use App\Repositories\\' . $classNamePluralUp . '\\' . $classNameSingularUp . 'Repository;', null, 2);


        //Begin Class
        $contents .= HelperFiles::formatLineBreakAndTab('class '. $classNameSingularUp . EnumFolderToApi::UPDATE. 'Controller extends Controller',null,1);
        $contents .= HelperFiles::formatLineBreakAndTab('{',null,2);

        $contents .= HelperFiles::formatLineBreakAndTab('private $repository;',null,1,1);

        $contents .= HelperFiles::formatLineBreakAndTab('public function __construct()',2,1,1);
        $contents .= HelperFiles::formatLineBreakAndTab('{',null,1,1);
        $contents .= HelperFiles::formatLineBreakAndTab('$this->repository = new ' . ucfirst($tableSingular) .'Repository();',null,1,2);
        $contents .= HelperFiles::formatLineBreakAndTab('}',null,2,1);


        //Update
        $contents .= HelperFiles::formatLineBreakAndTab('/**',null,1,1);
        $contents .= HelperFiles::formatLineBreakAndTab('* @header Bearer BEARER_AUTH ',null,1,1);
        $contents .= HelperFiles::formatLineBreakAndTab('*',null,1,1);

        foreach ($columns as $col){
            $contents .= HelperFiles::formatLineBreakAndTab('* @bodyParam ' . $col->name . ' string required',null,1,1);
        }

        $contents .= HelperFiles::formatLineBreakAndTab('*',null,1,1);
        $contents .= HelperFiles::formatLineBreakAndTab('* @param Request $request',null,1,1);
        $contents .= HelperFiles::formatLineBreakAndTab('* @param ' . $classNameSingularUp . ' $' . $tableSingular,null,1,1);
        $contents .= HelperFiles::formatLineBreakAndTab('* @return JsonResponse',null,1,1);
        $contents .= HelperFiles::formatLineBreakAndTab('*/',null,1,1);
        $contents .= HelperFiles::formatLineBreakAndTab('public function __invoke(Request $request, '.ucfirst($classNameSingularUp).' $'.$tableSingular.'): JsonResponse',null,1,1);
        $contents .= HelperFiles::formatLineBreakAndTab('{',null,2,1);


        $contents .= HelperFiles::formatLineBreakAndTab('if($this->isAdmin(auth()->user()->roles)){',null,1,2);
        $contents .= HelperFiles::formatLineBreakAndTab('// By Admin',null,2,3);
        $contents .= HelperFiles::formatLineBreakAndTab('$validator = Validator::make($request->all(), [',null,1,3);
        foreach ($columns as $col){
            $contents .= HelperFiles::formatLineBreakAndTab('\''.$col->name.'\'=>\'required\',',null,1,4);
        }
        $contents .= HelperFiles::formatLineBreakAndTab(']);',null,2,3);
        $contents .= HelperFiles::formatLineBreakAndTab('if($validator->fails()){',null,1,3);
        $contents .= HelperFiles::formatLineBreakAndTab('return $this->respondWithError(\'Error\', $validator->errors());',null,1,4);
        $contents .= HelperFiles::formatLineBreakAndTab('}',null,2,3);
        $contents .= HelperFiles::formatLineBreakAndTab('$data = $this->repository->update($'.$tableSingular.'->id, $request->all());',null,1,3);
        $contents .= HelperFiles::formatLineBreakAndTab('return $this->respondWithData(\'' . $classNameSingularUp . ' updated\', $data);',null,2,3);


        $contents .= HelperFiles::formatLineBreakAndTab('}else{',null,2,2);
        $contents .= HelperFiles::formatLineBreakAndTab('// By Role User',null,2,3);
        $contents .= HelperFiles::formatLineBreakAndTab('$validator = Validator::make($request->all(), [',null,1,3);
        foreach ($columns as $col){
            $contents .= HelperFiles::formatLineBreakAndTab('\''.$col->name.'\'=>\'required\',',null,1,4);
        }
        $contents .= HelperFiles::formatLineBreakAndTab(']);',null,2,3);
        $contents .= HelperFiles::formatLineBreakAndTab('if($validator->fails()){',null,1,3);
        $contents .= HelperFiles::formatLineBreakAndTab('return $this->respondWithError(\'Error\', $validator->errors());',null,1,4);
        $contents .= HelperFiles::formatLineBreakAndTab('}',null,2,3);
        //$contents .= HelperFiles::formatLineBreakAndTab('//$'.$tableSingular.'Owner = $this->repository->show' . EnumFolderToApi::AUTH_BY_USER . '(auth()->user()->employee->id, $'.$tableSingular.'->id);',null,1,3);
        //$contents .= HelperFiles::formatLineBreakAndTab('//if($'.$tableSingular.'Owner){',null,2,3);
        $contents .= HelperFiles::formatLineBreakAndTab('if($' . $tableSingular . '->company_id == auth()->user()->employee->company_id){',null,2,3);
        $contents .= HelperFiles::formatLineBreakAndTab('$data = $this->repository->update($'.$tableSingular.'->id, $request->all());',null,2,4);
        $contents .= HelperFiles::formatLineBreakAndTab('return $this->respondWithData(\'' . $classNameSingularUp . ' updated\', $data);',null,2,4);
        $contents .= HelperFiles::formatLineBreakAndTab('}else{',null,2,3);
        $contents .= HelperFiles::formatLineBreakAndTab('return $this->respondWithError(\'Error updated\', [[\'e\' => trans(\'validation.user_not_belong_company\')]]);',null,2,4);
        $contents .= HelperFiles::formatLineBreakAndTab('}',null,2,3);
        $contents .= HelperFiles::formatLineBreakAndTab('}',null,2,2);
        $contents .= HelperFiles::formatLineBreakAndTab('}',null,2,1);


        //End Class
        $contents .= HelperFiles::formatLineBreakAndTab('}');



        try {

            if(!file_exists($path)){
                mkdir($path, 0777, true);
            }
            // Write File
            $fh = fopen($path . '/' . $classNameSingularUp . EnumFolderToApi::UPDATE . 'Controller.php', 'w+') or die("Error open file: " . $classNameSingularUp . EnumFolderToApi::UPDATE . 'Controller.php');
            fwrite($fh, $contents)or die("Error write file: " . $classNameSingularUp . EnumFolderToApi::UPDATE . 'Controller.php');
            fclose($fh);

            return true;

        }catch (\Exception $e){
            return false;
        }



    }

}
