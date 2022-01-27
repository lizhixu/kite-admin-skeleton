<?php

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Support\Facades\Config;

if (!function_exists('adminOutput')) {
    /**
     * 输出状态
     * lzx add 2020/5/17 19:08
     * @param int $status
     * @param array|object $data
     * @param string|null $msg
     * @return array
     */
    function adminOutput(int $status, array|object $data = [], ?string $msg = null): array
    {
        $msg = $msg ?: Config::get('avue.status.' . $status);
        return ['status' => (int)$status, 'message' => $msg, 'time' => time(), 'data' => $data];
    }
}

if (!function_exists('jwt_encode')) {
    /**
     * jwt签发
     * @param $payload
     * @param $key
     * @return string
     * @author lzx
     * @time 2022/1/19 13:53
     */
    function jwt_encode($payload, $key): string
    {
        return JWT::encode($payload, $key);
    }
}

if (!function_exists('jwt_decode')) {
    /**
     * jwt解签
     * @param $token
     * @param $key
     * @return object
     * @author lzx
     * @time 2022/1/19 13:54
     */
    function jwt_decode($token, $key): object
    {
        return JWT::decode($token, new Key($key, 'HS256'));
    }
}