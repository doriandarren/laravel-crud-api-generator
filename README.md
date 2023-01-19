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
        $generator = new \Infinito\LaravelCrudApiGenerator\Generator();
        $generator->__invoke();
    }
}
```
