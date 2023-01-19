# Project CRUD API Laravel

Generate basic folder CRUD structure

```sh
    composer require infinito/generate-crud-api-laravel
```


Folder structure

```sh

- Controller

- Models

- Repositories


```


To implement class or method

```sh




class ClassName {
    public function methodName(){
        
        // Ex.
        $tableSingular = "telepassElconSwitzerland";
        $tablePlural = "telepassElconSwitzerlands";

        $ob = new \stdClass();
        $ob->name =  "company_id";
        $ob->type =  "input";
        
        $columns = [
            $ob
        ];

        $relationClass = "LevelOne";
        $relationType = "1";
        $nameSpace = "Bounded";
        $templateType = "3";

        (new \Infinito\LaravelCrudApiGenerator\Generator())->__invoke(
                                                                $tableSingular, 
                                                                $tablePlural, 
                                                                $columns, 
                                                                $relationClass, 
                                                                $relationType, 
                                                                $nameSpace, 
                                                                $templateType
                                                            );
    }
}
```
