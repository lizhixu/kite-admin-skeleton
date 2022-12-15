<?php

return [
    'auth_on' => env('AUTH_ON', 1),
    'status'  => [
        200 => '请求成功',
        201 => '参数错误',
        202 => '登录失败',
        203 => 'token无效',
        204 => '未知错误',
        205 => '无访问权限',
    ],
    'token'   => [
        //key
        'JWT_SECRET' => env('JWT_SECRET', 'Hlj92vO0GCJ6w3K'),
        //发行人
        'JWT_ISS'    => env('JWT_ISS', 'http://example.com'),
        //受众
        'JWT_AUD'    => env('JWT_AUD', 'http://example.org'),
    ],
];