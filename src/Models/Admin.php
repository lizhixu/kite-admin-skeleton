<?php

namespace iLzx\AdminStarter\Models;


use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'kite_admin';

    public function getAdmin($parent_id = 0, ... $select)
    {
        return self::where('parent_id', '=', $parent_id)->select($select)->get();
    }
}
