<?php

namespace iLzx\AdminStarter\Models;


class Menu extends Model
{
    protected $table = 'kite_menus';
    protected $fillable = ['id', 'type', 'parent_id', 'path', 'redirect', 'name', 'component', 'title', 'icon', 'isHide', 'isKeepAlive', 'isAffix', 'created_at', 'updated_at', 'tpl_type', 'options', 'options_type'];
    protected $guarded = [];

    public function getMenu($conditions, ...$select)
    {
        return self::where($conditions)->select($select)->get();
    }
}
