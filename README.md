# Project CRUD API Laravel


For new project.  

1.- Install package:

```sh

For prod:
composer require infinito/laravel-crud-api-generator

For dev:
composer require infinito/laravel-crud-api-generator:dev-main


For remove:
composer remove infinito/laravel-crud-api-generator

```


2.-Excute 

```sh

php artisan make:controller Dev/TestController

```


3.- Add Dev/TestController add web.php: 

```sh

...

use Infinito\LaravelCrudApiGenerator\Scripts;

...


class TestController {

    public function __invoke(){
    
        (new Scripts())->__invoke();
        echo "Ready!";
        
    }
    
}

```


4.- Add web.php:

```sh

Route::get('/test', [\App\Http\Controllers\Dev\TestController::class, '__invoke'])->name('test');

```



5.- Add inside "app/Http\Middleware\VerifyCsrfToken" exception "VerifyCsrfToken.php"

```sh

...
 protected $except = [
    'generator/*', // <---- This Line
    ...
 ];
...

```


6.- 

```sh

http://127.0.0.1:8090/generator

```



Folder structure

```sh

- Controller

- Models

- Repositories

```



Nota: Para nueva version, creae una "tag" y volver a subir la version 
