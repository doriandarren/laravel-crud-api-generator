<?php

namespace Infinito\LaravelCrudApiGenerator\Enums;

abstract class EnumFolderToApi
{

    //Path Folder
    const PATH_STORAGE = 'TO_API';

    //Path Folder structure
    const PATH_FOLDER_CONTROLER = 'Controllers';
    const PATH_FOLDER_MODEL = 'Models';
    const PATH_FOLDER_REPOSITORY = 'Repositories';
    const PATH_FOLDER_ROUTE = 'Route';
    const PATH_FOLDER_MIGRATION = 'Migrations';
    const PATH_FOLDER_SCRIPT = 'Scripts';
    const PATH_FOLDER_FRONT = 'Front';



    const LIST = 'List';
    const LIST_PAGINATE = 'ListPaginate';
    const SHOW = 'Show';
    const STORE = 'Store';
    const UPDATE = 'Update';
    const DESTROY = 'Destroy';



    const AUTH_BY_USER = 'ByRoleUser';


    const USE_TO_ROLE = 'employee_id';


    const USE_CASE_ID = '_id';



}
