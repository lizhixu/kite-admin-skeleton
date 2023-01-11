<?php

namespace iLzx\AdminStarter\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Icon extends Model
{
    use HasFactory;

    protected $table = 'kite_icons';
    public $fillable = ['icon_name', 'icon_class'];
}
