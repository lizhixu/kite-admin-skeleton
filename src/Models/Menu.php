<?php

namespace iLzx\AdminStarter\Models;


class Menu extends Model
{
    protected $table = 'kite_menus';

    public function getMenu($conditions, ...$select)
    {
        return self::where($conditions)->select($select)->get();
    }
}
