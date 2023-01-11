<?php

namespace iLzx\AdminStarter\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $table = 'kite_settings';
    public $fillable = ['name', 'value'];

    public static function get($name)
    {
        return self::where('name', $name)->select('value')->first()->value;
    }

    public static function set($data)
    {
        return self::updateOrCreate($data);
    }
}
