<?php

use Illuminate\Support\Facades\Route;
use iLzx\AdminStarter\Controls\AdminController;
use iLzx\AdminStarter\Controls\UpdateLogController;
use iLzx\AdminStarter\Controls\CommonController;
use iLzx\AdminStarter\Controls\IconManageController;
use iLzx\AdminStarter\Controls\MenuController;
use iLzx\AdminStarter\Controls\RoleController;
use iLzx\AdminStarter\Controls\UserController;
use iLzx\AdminStarter\Controls\ApiLogController;

Route::middleware('kite.avue')->prefix('k-avue')->group(static function () {
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
        Route::get('get_icon_options', [IconManageController::class, 'iconOptions']);
        Route::post('upload', [UpdateLogController::class, 'upload']);
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
        Route::prefix('upload_log')->group(function () {
            Route::get('list', [UpdateLogController::class, 'getList']);
        });
        Route::prefix('api_log')->group(function () {
            Route::get('list', [ApiLogController::class, 'getList']);
            Route::get('detail/{id}', [ApiLogController::class, 'getDetail']);
        });
    });
    Route::prefix('form')->group(function () {
        Route::prefix('personal')->group(function () {
            Route::get('get_info', [AdminController::class, 'getManageList']);
            Route::post('add', [AdminController::class, 'addManage']);
            Route::put('update', [AdminController::class, 'updateManage']);
            Route::delete('del', [AdminController::class, 'delManage']);
        });
    });
    //图标管理
    Route::prefix('icon_manage')->group(function () {
        Route::get('categorys', [IconManageController::class, 'categorysList']);
        Route::post('categorys_add', [IconManageController::class, 'categorysAdd']);
        Route::put('categorys_update', [IconManageController::class, 'categorysUpdate']);
        Route::delete('categorys_del', [IconManageController::class, 'categorysDelete']);
        Route::get('get_icon_url', [IconManageController::class, 'getIconUrl']);
        Route::post('icon_url', [IconManageController::class, 'iconUrl']);
        Route::post('add_icon', [IconManageController::class, 'iconAdd']);
        Route::get('icon_list/{category_alias}', [IconManageController::class, 'iconList']);
        Route::delete('icon_del/{id}', [IconManageController::class, 'iconDel']);
    });
});