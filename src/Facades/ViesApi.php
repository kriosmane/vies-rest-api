<?php

namespace Kriosmane\ViesApi\Facades;

use Illuminate\Support\Facades\Facade;
use Kriosmane\ViesApi\ViesApi as ViesApiClass;

class ViesApi extends Facade
{
    protected static function getFacadeAccessor()
    {
        return ViesApiClass::class;
    }
}
