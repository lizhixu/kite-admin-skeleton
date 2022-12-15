<?php


namespace iLzx\AdminStarter;


use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use iLzx\AdminStarter\Commands\DatabasesCommand;
use iLzx\AdminStarter\Facades\JWT\Facade\JWT;
use iLzx\AdminStarter\Commands\CreateUserCommand;
use iLzx\AdminStarter\Middleware\AvueTokenIsValid;

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
                CreateUserCommand::class,
            ]);
        }

        $this->loadTranslationsFrom(__DIR__ . '/Resources/lang', 'admin');

        $this->publishes([
            __DIR__ . '/Resources/lang' => resource_path('lang/vendor/admin'),
        ]);
    }

    /**
     * 中间件别名
     * @param $name
     * @param $class
     * @return mixed
     * @author lzx
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