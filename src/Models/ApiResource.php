<?php

namespace iLzx\AdminStarter\Models;


class ApiResource extends Model
{
    protected $table = 'kite_api_resource';
    protected $fillable = ['id', 'menu_id', 'api_method', 'api_url', 'created_at', 'updated_at'];
    protected $guarded = [];

    public function getList($conditions, ...$select)
    {
        return self::where($conditions)->select($select)->get()->toArray();
    }

    public function getMenuApi($conditions, ...$select)
    {
        return self::where($conditions)
            ->leftJoin('kite_api_resource', 'kite_api_resource.menu_id', '=', 'kite_menus.id')->select($select)->get();
    }
}
