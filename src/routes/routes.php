<?php

use Illuminate\Support\Facades\Route;
use iLzx\AdminStarter\Controls\AdminController;
use iLzx\AdminStarter\Controls\CommonController;
use iLzx\AdminStarter\Controls\MenuController;
use iLzx\AdminStarter\Controls\RoleController;
use iLzx\AdminStarter\Controls\UserController;

Route::prefix('k-avue')->group(static function () {
    Route::get('/pro', function () {
        return ['avue&kite' => 'v1.0.0'];
    });
    Route::get('captcha/{redomstr}', [CommonController::class, 'captcha']);
    Route::post('user/login', [UserController::class, 'login']);
    Route::get('get_options', [AdminController::class, 'getOptions']);
    //公共路由
    Route::get('user/getUserInfo', [UserController::class, 'getUserInfo']);
    Route::get('getMenu', [MenuController::class, 'getMenu']);
    Route::prefix('common')->group(static function () {
        Route::get('get_menu_options', [CommonController::class, 'menuOptions']);
        Route::get('get_rule_options', [CommonController::class, 'ruleOptions']);
    });
    //菜单
    Route::prefix('menu')->group(function () {
        Route::get('menuDetail/{id}', [MenuController::class, 'menuDetail']);
        Route::put('menuDetailSave', [MenuController::class, 'menuDetailSave']);
        //菜单
        Route::get('menuList', [MenuController::class, 'menuList']);
        Route::post('menuSave', [MenuController::class, 'menuSave']);
        Route::put('menuUpdate', [MenuController::class, 'menuUpdate']);
        Route::delete('menuDelete', [MenuController::class, 'menuDelete']);
    });

    Route::prefix('crud')->group(function () {
        Route::prefix('admin_manage')->group(function () {
            Route::get('list', [AdminController::class, 'getManageList']);
            Route::post('add', [AdminController::class, 'addManage']);
            Route::put('update', [AdminController::class, 'updateManage']);
            Route::delete('del', [AdminController::class, 'delManage']);
        });
        Route::prefix('role_manage')->group(function () {
            Route::get('list', [RoleController::class, 'getManageList']);
            Route::post('add', [RoleController::class, 'addRole']);
            Route::put('update', [RoleController::class, 'updateRole']);
            Route::delete('del', [RoleController::class, 'delRole']);
        });
    });
});