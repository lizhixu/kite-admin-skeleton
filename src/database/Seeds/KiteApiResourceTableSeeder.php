<?php

namespace iLzx\AdminStarter\Database\Seeds;

use Illuminate\Database\Seeder;

class KiteApiResourceTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('kite_api_resource')->delete();
        
        \DB::table('kite_api_resource')->insert(array (
            0 => 
            array (
                'id' => 1,
                'menu_id' => 12,
                'api_method' => '1',
                'api_url' => '/k-avue/menu/menuSave',
                'created_at' => '2022-11-22 05:48:27',
                'updated_at' => '2022-11-22 05:48:27',
            ),
            1 => 
            array (
                'id' => 2,
                'menu_id' => 4,
                'api_method' => '0',
                'api_url' => '/k-avue/menu/menuList',
                'created_at' => '2022-11-22 06:16:02',
                'updated_at' => '2022-11-22 06:16:02',
            ),
            2 => 
            array (
                'id' => 3,
                'menu_id' => 4,
                'api_method' => '0',
                'api_url' => '/k-avue/menu/menuDetail/{id}',
                'created_at' => '2022-11-22 06:16:02',
                'updated_at' => '2022-11-22 06:16:02',
            ),
            3 => 
            array (
                'id' => 4,
                'menu_id' => 14,
                'api_method' => '2',
                'api_url' => '/k-avue/menu/menuUpdate',
                'created_at' => '2022-11-22 23:12:26',
                'updated_at' => '2022-11-22 23:12:26',
            ),
            4 => 
            array (
                'id' => 5,
                'menu_id' => 15,
                'api_method' => '3',
                'api_url' => '/k-avue/menu/menuDelete',
                'created_at' => '2022-11-22 15:18:54',
                'updated_at' => '2022-11-22 15:18:54',
            ),
            5 => 
            array (
                'id' => 6,
                'menu_id' => 16,
                'api_method' => '2',
                'api_url' => '/k-avue/menu/menuDetailSave',
                'created_at' => '2022-11-22 23:52:22',
                'updated_at' => '2022-11-22 23:52:22',
            ),
            6 => 
            array (
                'id' => 7,
                'menu_id' => 5,
                'api_method' => '0',
                'api_url' => '/k-avue/crud/admin_manage/list',
                'created_at' => '2022-11-23 00:00:33',
                'updated_at' => '2022-11-23 00:00:33',
            ),
            7 => 
            array (
                'id' => 8,
                'menu_id' => 17,
                'api_method' => '1',
                'api_url' => '/k-avue/crud/admin_manage/add',
                'created_at' => '2022-11-22 16:02:07',
                'updated_at' => '2022-11-22 16:02:07',
            ),
            8 => 
            array (
                'id' => 9,
                'menu_id' => 18,
                'api_method' => '2',
                'api_url' => '/k-avue/crud/admin_manage/update',
                'created_at' => '2022-11-22 16:02:44',
                'updated_at' => '2022-11-22 16:02:44',
            ),
            9 => 
            array (
                'id' => 10,
                'menu_id' => 19,
                'api_method' => '3',
                'api_url' => '/k-avue/crud/admin_manage/del',
                'created_at' => '2022-11-23 00:04:04',
                'updated_at' => '2022-11-23 00:04:04',
            ),
            10 => 
            array (
                'id' => 11,
                'menu_id' => 20,
                'api_method' => '1',
                'api_url' => '/k-avue/crud/role_manage/add',
                'created_at' => '2022-11-23 00:06:36',
                'updated_at' => '2022-11-23 00:06:36',
            ),
            11 => 
            array (
                'id' => 12,
                'menu_id' => 21,
                'api_method' => '2',
                'api_url' => '/k-avue/crud/role_manage/update',
                'created_at' => '2022-11-23 00:06:48',
                'updated_at' => '2022-11-23 00:06:48',
            ),
            12 => 
            array (
                'id' => 13,
                'menu_id' => 22,
                'api_method' => '3',
                'api_url' => '/k-avue/crud/role_manage/del',
                'created_at' => '2022-11-23 00:07:00',
                'updated_at' => '2022-11-23 00:07:00',
            ),
            13 => 
            array (
                'id' => 14,
                'menu_id' => 6,
                'api_method' => '0',
                'api_url' => '/k-avue/crud/role_manage/list',
                'created_at' => '2022-12-16 00:27:28',
                'updated_at' => '2022-12-16 00:27:28',
            ),
            14 => 
            array (
                'id' => 15,
                'menu_id' => 23,
                'api_method' => '1',
                'api_url' => 'k-avue/icon_manage/categorys_add',
                'created_at' => '2022-12-23 10:35:32',
                'updated_at' => '2022-12-23 10:35:32',
            ),
            15 => 
            array (
                'id' => 16,
                'menu_id' => 24,
                'api_method' => '2',
                'api_url' => 'k-avue/icon_manage/categorys_update',
                'created_at' => '2022-12-23 18:44:07',
                'updated_at' => '2022-12-23 18:44:07',
            ),
            16 => 
            array (
                'id' => 17,
                'menu_id' => 25,
                'api_method' => '3',
                'api_url' => 'k-avue/icon_manage/categorys_del',
                'created_at' => '2022-12-23 18:44:40',
                'updated_at' => '2022-12-23 18:44:40',
            ),
            17 => 
            array (
                'id' => 18,
                'menu_id' => 29,
                'api_method' => '0',
                'api_url' => 'k-avue/icon_manage/categorys',
                'created_at' => '2022-12-23 18:45:23',
                'updated_at' => '2022-12-23 18:45:23',
            ),
            18 => 
            array (
                'id' => 19,
                'menu_id' => 11,
                'api_method' => '0',
                'api_url' => 'k-avue/icon_manage/categorys',
                'created_at' => '2022-12-23 02:46:24',
                'updated_at' => '2022-12-23 02:46:24',
            ),
            19 => 
            array (
                'id' => 20,
                'menu_id' => 11,
                'api_method' => '0',
                'api_url' => 'k-avue/icon_manage/get_icon_url',
                'created_at' => '2022-12-23 10:47:40',
                'updated_at' => '2022-12-23 10:47:40',
            ),
            20 => 
            array (
                'id' => 21,
                'menu_id' => 30,
                'api_method' => '1',
                'api_url' => 'k-avue/icon_manage/icon_url',
                'created_at' => '2022-12-23 18:48:02',
                'updated_at' => '2022-12-23 18:48:02',
            ),
            21 => 
            array (
                'id' => 22,
                'menu_id' => 11,
                'api_method' => '0',
                'api_url' => 'k-avue/icon_manage/icon_list/{category_alias}',
                'created_at' => '2022-12-23 18:49:07',
                'updated_at' => '2022-12-23 18:49:07',
            ),
            22 => 
            array (
                'id' => 23,
                'menu_id' => 32,
                'api_method' => '3',
                'api_url' => 'k-avue/icon_manage/icon_del/{id}',
                'created_at' => '2022-12-23 18:49:28',
                'updated_at' => '2022-12-23 18:49:28',
            ),
            23 => 
            array (
                'id' => 24,
                'menu_id' => 31,
                'api_method' => '1',
                'api_url' => 'k-avue/icon_manage/add_icon',
                'created_at' => '2022-12-23 18:50:01',
                'updated_at' => '2022-12-23 18:50:01',
            ),
            24 => 
            array (
                'id' => 25,
                'menu_id' => 33,
                'api_method' => '0',
                'api_url' => '/k-avue/menu/menuList',
                'created_at' => '2023-02-08 13:08:06',
                'updated_at' => '2023-02-08 13:08:06',
            ),
            25 => 
            array (
                'id' => 26,
                'menu_id' => 33,
                'api_method' => '0',
                'api_url' => '/k-avue/menu/menuDetail/{id}',
                'created_at' => '2023-02-08 13:08:06',
                'updated_at' => '2023-02-08 13:08:06',
            ),
            26 => 
            array (
                'id' => 27,
                'menu_id' => 34,
                'api_method' => '0',
                'api_url' => '/k-avue/crud/admin_manage/list',
                'created_at' => '2023-02-08 13:09:15',
                'updated_at' => '2023-02-08 13:09:15',
            ),
            27 => 
            array (
                'id' => 28,
                'menu_id' => 35,
                'api_method' => '0',
                'api_url' => '/k-avue/crud/role_manage/list',
                'created_at' => '2023-02-08 13:10:30',
                'updated_at' => '2023-02-08 13:10:30',
            ),
            28 => 
            array (
                'id' => 29,
                'menu_id' => 36,
                'api_method' => '0',
                'api_url' => 'k-avue/icon_manage/categorys',
                'created_at' => '2023-02-08 13:12:10',
                'updated_at' => '2023-02-08 13:12:10',
            ),
            29 => 
            array (
                'id' => 30,
                'menu_id' => 36,
                'api_method' => '0',
                'api_url' => 'k-avue/icon_manage/get_icon_url',
                'created_at' => '2023-02-08 13:12:10',
                'updated_at' => '2023-02-08 13:12:10',
            ),
            30 => 
            array (
                'id' => 31,
                'menu_id' => 36,
                'api_method' => '0',
                'api_url' => 'k-avue/icon_manage/icon_list/{category_alias}',
                'created_at' => '2023-02-08 13:12:10',
                'updated_at' => '2023-02-08 13:12:10',
            ),
            31 => 
            array (
                'id' => 32,
                'menu_id' => 26,
                'api_method' => '0',
                'api_url' => 'k-avue/crud/upload_log/list',
                'created_at' => '2023-02-20 16:10:44',
                'updated_at' => '2023-02-20 16:10:44',
            ),
            32 => 
            array (
                'id' => 33,
                'menu_id' => 40,
                'api_method' => '0',
                'api_url' => 'k-avue/crud/api_log/list',
                'created_at' => '2023-04-08 14:00:17',
                'updated_at' => '2023-04-08 14:00:17',
            ),
            33 => 
            array (
                'id' => 34,
                'menu_id' => 40,
                'api_method' => '0',
                'api_url' => 'k-avue/crud/api_log/detail/{id}',
                'created_at' => '2023-04-09 10:11:54',
                'updated_at' => '2023-04-09 10:11:54',
            ),
            34 => 
            array (
                'id' => 35,
                'menu_id' => 46,
                'api_method' => '1',
                'api_url' => 'k-avue/form/personal_save',
                'created_at' => '2023-05-15 20:37:49',
                'updated_at' => '2023-05-15 20:37:49',
            ),
            35 => 
            array (
                'id' => 36,
                'menu_id' => 46,
                'api_method' => '1',
                'api_url' => 'k-avue/form/reset_password',
                'created_at' => '2023-05-15 20:37:49',
                'updated_at' => '2023-05-15 20:37:49',
            ),
        ));
        
        
    }
}