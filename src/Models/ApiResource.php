<?php

namespace iLzx\AdminStarter\Models;


class ApiResource extends Model
{
    protected $table = 'kite_api_resource';

    public function getList($conditions, ...$select)
    {
        return self::where($conditions)->select($select)->get()->toArray();
    }
}
