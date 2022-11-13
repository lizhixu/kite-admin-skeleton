<?php

use Illuminate\Support\Facades\Route;
use iLzx\AdminStarter\Controls\AdminController;
use iLzx\AdminStarter\Controls\CommonController;
use iLzx\AdminStarter\Controls\MenuController;
use iLzx\AdminStarter\Controls\UserController;

Route::prefix('k-avue')->group(static function () {
    Route::get('/pro', function () {
        return ['avue&kite' => 'v1.0.0'];
    });
    Route::get('captcha/{redomstr}', [CommonController::class, 'captcha']);
    Route::post('user/login', [UserController::class, 'login']);
    Route::get('get_options', [AdminController::class, 'getOptions']);

    Route::middleware(['kite.avue'])->group(function () {
        Route::get('getMenu', [MenuController::class, 'getMenu']);
        Route::prefix('menu')->group(function () {
            Route::get('menuDetail/{id}', [MenuController::class, 'menuDetail']);
            Route::put('menuDetailSave', [MenuController::class, 'menuDetailSave']);
            //菜单
            Route::get('menuList', [MenuController::class, 'menuList']);
            Route::post('menuSave', [MenuController::class, 'menuSave']);
            Route::put('menuUpdate', [MenuController::class, 'menuUpdate']);
            Route::delete('menuDelete', [MenuController::class, 'menuDelete']);
        });
        Route::get('user/getTopMenu', [UserController::class, 'getTopMenu']);
        Route::get('user/getUserInfo', [UserController::class, 'getUserInfo']);
    });
});