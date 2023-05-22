<?php

namespace iLzx\AdminStarter\Facades\JWT\Facade;

use Firebase\JWT\ExpiredException;
use iLzx\AdminStarter\Models\Admin;

class JWT
{
    private static mixed $config;

    public function __construct()
    {
        $this::$config = config('avue.token');
    }

    /**
     * 创建token.
     *
     * @param $data
     * @param $id
     * @param $checked
     * @param string $sub
     *
     * @return string
     *
     * @author lzx
     *
     * @time 2022/1/27 15:58
     */
    public static function createToken($data, $id, $checked, string $sub = 'kite-admin-token'): string
    {
        $exp = $checked ? 7 * 86400 : 3600 * 2;
        $key = self::$config['JWT_SECRET'];
        $payload = [
            'data' => $data,
            'iss'  => self::$config['JWT_ISS'],
            'aud'  => self::$config['JWT_AUD'],
            'nbf'  => time(),
            'iat'  => time(),
            'exp'  => time() + $exp,
            'sub'  => $sub,
            'jti'  => md5($id),
        ];

        return jwt_encode($payload, $key);
    }

    public static function parseToken(string $token): object
    {
        return jwt_decode($token, self::$config['JWT_SECRET']);
    }

    /**
     * 验证token.
     *
     * @param string $token
     *
     * @return bool|object
     *
     * @author lzx
     *
     * @time 2022/1/27 15:59
     */
    public static function validationToken(string $token): bool|object
    {
        $jwt = self::parseToken($token);
        //检查是否有效
        if ($jwt->nbf <= time() && $jwt->exp > time()) {
            //验证管理员状态
            $admin = Admin::where([
                ['id', '=', $jwt->data->id],
                ['status', '=', 1],
            ])->select('id', 'username', 'name', 'avatar', 'role')->first();
            if (!$admin) {
                throw new ExpiredException('账户已封禁');
            }

            return $admin;
        }

        return false;
    }
}
