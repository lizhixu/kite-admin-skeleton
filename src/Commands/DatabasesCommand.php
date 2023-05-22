<?php

namespace iLzx\AdminStarter\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DatabasesCommand extends Command
{
    /**
     * 命令名称及签名.
     *
     * @var string
     */
    protected $signature = 'kite:db-cache';

    /**
     * 命令描述.
     *
     * @var string
     */
    protected $description = '缓存数据库结构';

    /**
     * 创建命令.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 执行命令.
     *
     * @return void
     */
    public function handle(): void
    {
        $databases = Schema::getAllTables();
        $tmp = [];
        foreach ($databases as $key => $database) {
            $table_name = $database->Tables_in_learns;
            $table_infos = DB::select('show columns from '.$table_name);
            foreach ($table_infos as $TK => $table_info) {
                $type = explode('(', $table_info->Type);
                $tmp[$table_name][$table_info->Field]['type'] = $type[0];
                if (count($type) > 1) {
                    $size = explode(')', $type[1]);
                    $tmp[$table_name][$table_info->Field]['length'] = $size[0];
                    $tmp[$table_name][$table_info->Field]['signed'] = trim($size[1]);
                }
            }
        }
        Cache::put('databases_cache', $tmp);
        $this->info('数据库结构缓存成功');
    }
}
