<?php

namespace iLzx\AdminStarter\Commands;

use Illuminate\Console\Command;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Artisan;

class IseedCommand extends Command
{
    /**
     * 命令名称及签名
     *
     * @var string
     */
    protected $signature = 'kite:iseed';
    protected $tables = ['kite_api_resource', 'kite_icons', 'kite_icon_categorys', 'kite_menus', 'kite_settings'];

    /**
     * 命令描述
     *
     * @var string
     */
    protected $description = 'kite数据填充';

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
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //进度条
        $bar = $this->output->createProgressBar(2);
        $bar->start();
        try {
            Artisan::call('iseed ' . implode(',', $this->tables) . ' --force');
            $bar->advance();
            $bar->finish();
            $this->output->success('基础数据填充已生成！');
        } catch (QueryException $exception) {
            $this->newLine();
            $this->error($exception->getMessage());
        }
    }
}