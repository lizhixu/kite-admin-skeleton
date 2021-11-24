<?php

namespace iLzx\AdminStarter\Models;


use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'kite_menus';

    public function getMenu($parent_id = 0, ... $select)
    {
        return self::where('parent_id', '=', $parent_id)->select($select)->get();
    }
}
