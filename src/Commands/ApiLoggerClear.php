<?php

namespace iLzx\AdminStarter\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ApiLoggerClear extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kite:api-logger-clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '清理日志记录';

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
        DB::table('kite_api_loggers')->truncate();

        return 0;
    }
}
