<?php


namespace iLzx\AdminStarter;


use Illuminate\Support\ServiceProvider;
use iLzx\AdminStarter\Commands\DatabasesCommand;
use iLzx\AdminStarter\Facades\JWT\Facade\JWT;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * 注册绑定
     * lzx add 2020/3/9 0:48
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/Config/avue.php', config_path('avue.php')
        );
        $this->app->singleton('jwt', function () {
            return new JWT();
        });
    }

    /**
     * 注册后启动
     * lzx add 2020/3/9 0:53
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/Config/avue.php' => config_path('avue.php'),
        ], 'config');

        $this->loadRoutesFrom(__DIR__ . '/Routes/routes.php');
        $this->loadMigrationsFrom(__DIR__ . '/Database/migrations');
        if ($this->app->runningInConsole()) {
            $this->commands([
                DatabasesCommand::class,
            ]);
        }

        $this->loadTranslationsFrom(__DIR__ . '/Resources/lang', 'admin');

        $this->publishes([
            __DIR__ . '/Resources/lang' => resource_path('lang/vendor/admin'),
        ]);
    }
}