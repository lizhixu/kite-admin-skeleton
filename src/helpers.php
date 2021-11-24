<?php

use JetBrains\PhpStorm\ArrayShape;

if (!function_exists('adminOutput')) {
    /**
     * 输出状态
     * lzx add 2020/5/17 19:08
     * @param int $status
     * @param array $data
     * @return array
     */
    function adminOutput(int $status, array $data = []): array
    {
        $msg = \Illuminate\Support\Facades\Config::get('avue.status.' . $status);
        return ['stauts' => $status, 'message' => $msg, 'data' => $data];
    }
}