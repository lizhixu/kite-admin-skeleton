<?php

namespace iLzx\AdminStarter\Commands;

use Illuminate\Console\Command;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;
use iLzx\AdminStarter\Models\Admin;
use iLzx\AdminStarter\Models\Role;

class InitCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kite:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '初始化系统数据';
    protected $help = '* 需提前在.env文件中配置好数据库';

    /**
     * Create a new command instance.
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
        $bar = $this->output->createProgressBar(5);
        $bar->start();

        try {
            //1. migrate
            Artisan::call('migrate');
            $bar->advance();
            //2. 创建角色
            $role = $this->initRole();
            $bar->advance();
            //3. 创建管理员
            $admin = $this->initAdmin(['role' => json_encode([$role->id])]);
            $bar->advance();
            //4. 基础数据填充
            Artisan::call('db:seed', ['--class' => '\iLzx\AdminStarter\Database\Seeds\DatabaseSeeder']);
            $bar->advance();
            //5.创建软链接
            Artisan::call('storage:link');
            $bar->finish();
            $this->output->success('数据初始化完成！请保存超级管理员密码，关闭控制台后密码无法找回！');
            $this->output->table(['超级管理员账号', '超级管理员密码'], $admin);
        } catch (QueryException $exception) {
            $this->newLine();
            $this->error($exception->getMessage());
        }
    }

    protected function initRole()
    {
        $role = new Role();
        $role->fill([
            'role_name'  => '超级管理员',
            'parent_id'  => 0,
            'sort'       => 0,
            'menu_ids'   => '[]',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        $role->save();

        return $role;
    }

    protected function initAdmin($insert_res): array
    {
        $name = 'admin';
        $password = Str::random(8);
        $res = [
            'username'   => $name,
            'password'   => md5('kite'.$password),
            'name'       => $name,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ] + $insert_res;
        Admin::insert($res);

        return [['username' => $name, 'password' => $password]];
    }
}
