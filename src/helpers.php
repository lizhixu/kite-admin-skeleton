<?php

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Support\Facades\Config;

if (!function_exists('adminOutput')) {
    /**
     * 输出状态
     * lzx add 2020/5/17 19:08
     * @param int $status
     * @param array|object|null $data
     * @param string|null $msg
     * @return array
     */
    function adminOutput(int $status, array|object|null $data = [], ?string $msg = null): array
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
        JWT::$leeway = 30; // $leeway in seconds
        return JWT::decode($token, new Key($key, 'HS256'));
    }
}
/**
 * 无限级分类
 */
if (!function_exists('unlimited_class')) {
    function unlimited_class($items, $parent_id = 0): array
    {
        $data = [];
        foreach ($items as $item) {
            $this_parent_id = $item['value'];
            if ($item['parent_id'] === $parent_id) {
                $item_tmp = $item;
                $children = unlimited_class($items, $this_parent_id);
                if ($children) {
                    $item_tmp['children'] = $children;
                }
                $data[] = $item_tmp;
            }
        }
        return $data;
    }
}

/**
 * 对象转数组
 */
if (!function_exists('object_to_array')) {
    function object_to_array($object): array
    {
        return json_decode(json_encode($object), true);
    }
}