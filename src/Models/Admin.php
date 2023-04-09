<?php

namespace iLzx\AdminStarter\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Model
{
    use HasFactory;


    protected $table = 'kite_admin';
    public $fillable = ['id', 'username', 'password', 'name', 'avatar', 'last_login_time', 'status', 'created_at', 'updated_at', 'role',];

    public function getAdmin($conditions, ...$select)
    {
        return self::where($conditions)->select($select)->get();
    }
}
