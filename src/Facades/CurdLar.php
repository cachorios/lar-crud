<?php

namespace Cachorios\CrudLar\Facades;

use Illuminate\Support\Facades\Facade;

class CurdLar extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'crud-lar';
    }

}