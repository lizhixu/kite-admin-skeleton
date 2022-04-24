<?php

namespace iLzx\AdminStarter\Commands;

use Illuminate\Console\Command;
use iLzx\AdminStarter\Models\Admin;

class CreateUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'avue:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '生成管理员';

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
        return Admin::insert([
            'username'        => 'admin',
            'password'        => '5e0d7365e38335590baf3489f287a006',
            'name'            => 'wxuns',
            'avatar'          => 'https://api.multiavatar.com/jacyli.png',
            'last_login_time' => date('Y-m-d H:i:s'),
        ]);
    }
}
