<?php

namespace iLzx\AdminStarter\Commands;

use Illuminate\Console\Command;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;

class UpdateCommand extends Command
{
    /**
     * 命令名称及签名
     *
     * @var string
     */
    protected $signature = 'kite:update';

    /**
     * 命令描述
     *
     * @var string
     */
    protected $description = 'kite数据升级';

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
            //1. migrate
            Artisan::call('migrate');
            $bar->advance();
            //2. 基础数据填充
            Artisan::call('db:seed', ['--class' => '\iLzx\AdminStarter\Database\Seeds\DatabaseSeeder']);
            $bar->advance();
            $bar->finish();
            $this->output->success('数据升级完成！');
        } catch (QueryException $exception) {
            $this->newLine();
            $this->error($exception->getMessage());
        }
    }
}