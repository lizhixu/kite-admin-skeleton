<?php

namespace iLzx\AdminStarter\Facades\JWT;

use Illuminate\Support\Facades\Facade;

/**
 * @method static string createToken($data, $id, $sub = 'kite-admin-token')
 * @method static string parseToken($token)
 * @method static string validationToken($token)
 */
class JWT extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'jwt';
    }
}