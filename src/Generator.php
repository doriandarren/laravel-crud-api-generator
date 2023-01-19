<?php

namespace Infinito\LaravelCrudApiGenerator;


use Infinito\LaravelCrudApiGenerator\Repositories\ToApis\ToApiRepository;



class Generator
{

    public function __invoke()
    {

        (new ToApiRepository())->__invoke();

    }

}
