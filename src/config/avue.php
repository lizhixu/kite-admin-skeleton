<?php

return [
    'status' => [
        200 => '获取成功',
        201 => '参数错误',
        202 => '登录失败',
        203 => '权限创建成功',
    ],
    'token'  => [
        'issuedBy'           => env('KITE_JWT_issuedBy', 'http://example.com'),
        'permittedFor'       => env('KITE_JWT_issuedBy', 'http://example.com'),
        'identifiedBy'       => env('KITE_JWT_identifiedBy', '4f1g23a12aa'),
        'canOnlyBeUsedAfter' => env('KITE_JWT_canOnlyBeUsedAfter', '+0 minute'),
        'expiresAt'          => env('KITE_JWT_expiresAt', '+24 hour'),
        'withHeader'         => env('KITE_JWT_withHeader', 'kite'),
    ]
];