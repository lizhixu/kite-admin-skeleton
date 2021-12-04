<?php

use Illuminate\Support\Facades\Config;
use JetBrains\PhpStorm\ArrayShape;

if (!function_exists('adminOutput')) {
    /**
     * 输出状态
     * lzx add 2020/5/17 19:08
     * @param int $status
     * @param array $data
     * @param null $msg
     * @return array
     */
    function adminOutput(int $status, array $data = [], $msg = null): array
    {
        $msg = $msg ?: Config::get('avue.status.' . $status);
        return ['status' => (int)$status, 'message' => $msg, 'data' => $data];
    }
}