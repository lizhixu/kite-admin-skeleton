<?php

namespace iLzx\AdminStarter\Models;

use Illuminate\Support\Facades\DB;

class Model extends \Illuminate\Database\Eloquent\Model
{
    public function __construct()
    {
        $table_infos = DB::select("show columns from " . DB::getConfig('prefix') . $this->table);
        $this->fillable(array_column($table_infos, 'Field'));
        parent::__construct();
    }
}