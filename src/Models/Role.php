<?php

namespace iLzx\AdminStarter\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

class Role extends Model
{
    use HasFactory;

    protected $table = 'kite_role';
    protected $fillable = ['role_name', 'parent_id', 'sort', 'menu_ids'];

    public function getList($conditions, ...$select)
    {
        return self::where($conditions)->select($select)->get();
    }

    public function getSingle($conditions, ...$select)
    {
        return self::where($conditions)->select($select)->first();
    }
}
