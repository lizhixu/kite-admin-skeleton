<?php

namespace iLzx\AdminStarter;

use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;
use iLzx\AdminStarter\Facades\JWT\Facade\JWT;
use iLzx\AdminStarter\Middleware\ApiLoggerMiddleware;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * 注册绑定
     * lzx add 2020/3/9 0:48.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/Config/avue.php',
            config_path('avue.php')
        );
        $this->app->singleton('jwt', function () {
            return new JWT();
        });
    }

    /**
     * 注册后启动
     * lzx add 2020/3/9 0:53.
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/Config/avue.php' => config_path('avue.php'),
        ], 'config');

        $this->loadRoutesFrom(__DIR__.'/Routes/routes.php');
        $this->loadMigrationsFrom(__DIR__.'/Database/migrations');
        $this->addMiddlewareAlias('kite.avue', ApiLoggerMiddleware::class);
        if ($this->app->runningInConsole()) {
            $command_file = File::files(__DIR__.'/Commands');
            $command_class = array_map(callback: function ($item) {
                return "\iLzx\AdminStarter\Commands\\".str_replace('.php', '', $item->getFilename());
            }, array: $command_file);
            $this->commands($command_class);
        }
    }

    /**
     * 中间件别名.
     *
     * @param $name
     * @param $class
     *
     * @return mixed
     *
     * @author lzx
     *
     * @time 2022/1/27 16:13
     */
    protected function addMiddlewareAlias($name, $class): mixed
    {
        $router = $this->app['router'];

        // 判断aliasMiddleware是否在类中存在
        if (method_exists($router, 'aliasMiddleware')) {
            // aliasMiddleware 顾名思义,就是给中间件设置一个别名
            return $router->aliasMiddleware($name, $class);
        }

        return $router->middleware($name, $class);
    }
}
