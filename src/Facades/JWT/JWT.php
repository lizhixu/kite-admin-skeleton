<?php

namespace iLzx\AdminStarter\Facades\JWT;

use Illuminate\Support\Facades\Facade;

class JWT extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'jwt';
    }
}