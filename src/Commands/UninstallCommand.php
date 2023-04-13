<?php

namespace iLzx\AdminStarter\Commands;

use Illuminate\Console\Command;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;

class UninstallCommand extends Command
{
    /**
     * 命令名称及签名
     *
     * @var string
     */
    protected $signature = 'kite:uninstall';

    /**
     * 命令描述
     *
     * @var string
     */
    protected $description = 'kite数据卸载';

    /**
     * 创建命令
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 执行命令
     *
     * @return void
     */
    public function handle(): void
    {
        if ($this->confirm('数据删除不可逆是否继续?')) {
            try {
                Schema::dropIfExists('kite_admin');
                Schema::dropIfExists('kite_role');
                Schema::dropIfExists('kite_settings');
                Schema::dropIfExists('kite_menus');
                Schema::dropIfExists('kite_api_resource');
                Schema::dropIfExists('kite_icons');
                Schema::dropIfExists('kite_icon_categorys');
                Schema::dropIfExists('kite_attachment_manage');
                Schema::dropIfExists('kite_api_loggers');
                //清理migrations
                chdir(__DIR__);
                $migrate_file = scandir(realpath('./../Database/migrations'));
                $un_migrate = [];
                foreach ($migrate_file as $item) {
                    if ($item === '.' || $item === '..') {
                        continue;
                    }
                    $un_migrate[] = rtrim($item, '.php');
                }
                if ($un_migrate) {
                    DB::table('migrations')->whereIn('migration', $un_migrate)->delete();
                }
                $this->output->success('数据卸载完成！');
            } catch (QueryException $exception) {
                $this->newLine();
                $this->error($exception->getMessage());
            }
        }
    }
}