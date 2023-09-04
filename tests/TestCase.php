<?php

namespace Cachorios\CrudLar\Tests;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return ['Cachorios\CrudLar\CrudLarServiceProvider'];
    }

    protected function getPackageAliases($app)
    {
        return [
            'CrudLar' => 'Cachorios\CrudLar\Facades\CrudLar',
        ];
    }


}