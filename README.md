# Project CRUD API Laravel


For new project.  

1.- Excute:

```sh

php artisan make:controller Dev/TestController

```


2.- add web.php:

```sh

Route::get('/test', [\App\Http\Controllers\Dev\TestController::class, '__invoke'])->name('test');

```

3.- Add inside "app/Http\Middleware\VerifyCsrfToken" exception "VerifyCsrfToken.php"

```sh

...
 protected $except = [
    'generator/*', // <---- This Line
    ...
 ];
...

```


4.- Install package

```sh

For prod:
composer require infinito/generate-crud-api-laravel

For dev:
composer require infinito/laravel-crud-api-generator:dev-main

For remove:
composer remove infinito/laravel-crud-api-generator

```


5.- To implement class or method

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



Folder structure

```sh

- Controller

- Models

- Repositories

```
