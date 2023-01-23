# Project CRUD API Laravel


For new project.  

1.- Excute:

```sh

php artisan make:controller Dev/TestController

```

2.- add inside Dev/TestController


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


3.- add web.php:

```sh

Route::get('/test', [\App\Http\Controllers\Dev\TestController::class, '__invoke'])->name('test');

```

4.- Add inside "app/Http\Middleware\VerifyCsrfToken" exception "VerifyCsrfToken.php"

```sh

...
 protected $except = [
    'generator/*', // <---- This Line
    ...
 ];
...

```


5.- Install package

```sh

For prod:
composer require infinito/laravel-crud-api-generator

For dev:
composer require infinito/laravel-crud-api-generator:dev-main


For remove:
composer remove infinito/laravel-crud-api-generator

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
