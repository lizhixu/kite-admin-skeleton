<?php

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Support\Facades\Config;

if (!function_exists('adminOutput')) {
    /**
     * 输出状态
     * lzx add 2020/5/17 19:08.
     *
     * @param int               $status
     * @param array|object|null $data
     * @param string|null       $msg
     *
     * @return array
     */
    function adminOutput(int $status, $data = [], ?string $msg = null): array
    {
        $msg = $msg ?: Config::get('avue.status.'.$status);

        return ['status' => (int) $status, 'message' => $msg, 'time' => time(), 'data' => $data];
    }
}

if (!function_exists('jwt_encode')) {
    /**
     * jwt签发.
     *
     * @param $payload
     * @param $key
     *
     * @return string
     *
     * @author lzx
     *
     * @time 2022/1/19 13:53
     */
    function jwt_encode($payload, $key): string
    {
        return JWT::encode($payload, $key);
    }
}

if (!function_exists('jwt_decode')) {
    /**
     * jwt解签.
     *
     * @param $token
     * @param $key
     *
     * @return object
     *
     * @author lzx
     *
     * @time 2022/1/19 13:54
     */
    function jwt_decode($token, $key): object
    {
        JWT::$leeway = 30; // $leeway in seconds

        return JWT::decode($token, new Key($key, 'HS256'));
    }
}

if (!function_exists('unlimited_class')) {
    /**
     * 无限级分类.
     *
     * @param $items
     * @param string $key
     * @param string $parent_key
     * @param int    $parent_id
     *
     * @return array
     */
    function unlimited_class($items, $key = 'value', $parent_key = 'parent_id', $parent_id = 0): array
    {
        $data = [];
        foreach ($items as $item) {
            $this_parent_id = $item[$key];
            if ($item[$parent_key] === $parent_id) {
                $item_tmp = $item;
                $children = unlimited_class($items, $key, $parent_key, $this_parent_id);
                if ($children) {
                    $item_tmp['children'] = $children;
                }
                $data[] = $item_tmp;
            }
        }

        return $data;
    }
}

if (!function_exists('object_to_array')) {
    /**
     * 对象转数组.
     *
     * @param $object
     *
     * @return array
     */
    function object_to_array($object): array
    {
        return json_decode(json_encode($object), true);
    }
}
if (!function_exists('str_to_avue')) {
    /**
     * avue字符串转json.
     *
     * @param $data
     *
     * @return mixed
     */
    function str_to_avue($data)
    {
        $data = str_replace(["\r", "\n", "\t"], '', $data);
        $data = str_replace(["'true'", "'false'"], ['true', 'false'], $data);
        $data = str_replace(['"true"', '"false"'], ['true', 'false'], $data);
//        $str = preg_replace(["/([a-zA-Z_]+[a-zA-Z0-9_]*)\s*:/", "/:\s*'(.*?)'/"], ['"\1":', ': "\1"'], $data);

        return json_decode(str_replace(['\'', '\\'], ['"', ''], $data));
    }
}

if (!function_exists('get_user_info')) {
    /**
     * 获取当前管理员信息.
     *
     * @return array|null
     */
    function get_user_info(): array|null
    {
        return json_decode(config('userInfo'), true);
    }
}

if (!function_exists('array_value_group')) {
    /**
     * 二维数组根据某一字段分组，并以这个字段值为key.
     *
     * @param $array
     * @param $flag
     *
     * @return array
     */
    function array_value_group($array, $flag): array
    {
        $tmp_arr = [];
        foreach ($array as $value) {
            $tmp_arr[$value[$flag]][] = $value;
        }

        return $tmp_arr;
    }
}

if (!function_exists('str_joint')) {
    /**
     * 无限级字符串拼接.
     *
     * @param $index
     * @param $items
     * @param $str_key
     * @param string $key
     * @param string $parent_key
     *
     * @return string
     */
    function str_joint($index, $items, $str_key, $key = 'id', $parent_key = 'parent_id'): string
    {
        $items = array_column($items, null, $key);
        $temp_str = $items[$index][$str_key];
        if (!empty($items[$items[$index][$parent_key]]) && $parent_item = $items[$items[$index][$parent_key]]) {
            $temp_str = str_joint($parent_item[$key], $items, $str_key, $key, $parent_key).'-'.$temp_str;
        }

        return $temp_str;
    }
}
