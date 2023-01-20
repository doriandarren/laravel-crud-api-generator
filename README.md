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

Add inside exception "VerifyCsrfToken.php"

```sh

...
 protected $except = [
    'generator/*', // <---- This Line
    ...
 ];
...

```



To implement class or method

```sh

...

use Infinito\LaravelCrudApiGenerator\Scripts;

...


class ClassTest {
    public function methodTest(){
        (new Scripts())->__invoke();
    }
}

```
