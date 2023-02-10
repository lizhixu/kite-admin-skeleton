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
                'api_method' => '1',
                'api_url' => '/k-avue/menu/menuSave',
                'created_at' => '2022-11-22 05:48:27',
                'id' => 1,
                'menu_id' => 12,
                'updated_at' => '2022-11-22 05:48:27',
            ),
            1 =>
            array (
                'api_method' => '0',
                'api_url' => '/k-avue/menu/menuList',
                'created_at' => '2022-11-22 06:16:02',
                'id' => 2,
                'menu_id' => 4,
                'updated_at' => '2022-11-22 06:16:02',
            ),
            2 =>
            array (
                'api_method' => '0',
                'api_url' => '/k-avue/menu/menuDetail/{id}',
                'created_at' => '2022-11-22 06:16:02',
                'id' => 3,
                'menu_id' => 4,
                'updated_at' => '2022-11-22 06:16:02',
            ),
            3 =>
            array (
                'api_method' => '2',
                'api_url' => '/k-avue/menu/menuUpdate',
                'created_at' => '2022-11-22 23:12:26',
                'id' => 4,
                'menu_id' => 14,
                'updated_at' => '2022-11-22 23:12:26',
            ),
            4 =>
            array (
                'api_method' => '3',
                'api_url' => '/k-avue/menu/menuDelete',
                'created_at' => '2022-11-22 15:18:54',
                'id' => 5,
                'menu_id' => 15,
                'updated_at' => '2022-11-22 15:18:54',
            ),
            5 =>
            array (
                'api_method' => '2',
                'api_url' => '/k-avue/menu/menuDetailSave',
                'created_at' => '2022-11-22 23:52:22',
                'id' => 6,
                'menu_id' => 16,
                'updated_at' => '2022-11-22 23:52:22',
            ),
            6 =>
            array (
                'api_method' => '0',
                'api_url' => '/k-avue/crud/admin_manage/list',
                'created_at' => '2022-11-23 00:00:33',
                'id' => 7,
                'menu_id' => 5,
                'updated_at' => '2022-11-23 00:00:33',
            ),
            7 =>
            array (
                'api_method' => '1',
                'api_url' => '/k-avue/crud/admin_manage/add',
                'created_at' => '2022-11-22 16:02:07',
                'id' => 8,
                'menu_id' => 17,
                'updated_at' => '2022-11-22 16:02:07',
            ),
            8 =>
            array (
                'api_method' => '2',
                'api_url' => '/k-avue/crud/admin_manage/update',
                'created_at' => '2022-11-22 16:02:44',
                'id' => 9,
                'menu_id' => 18,
                'updated_at' => '2022-11-22 16:02:44',
            ),
            9 =>
            array (
                'api_method' => '3',
                'api_url' => '/k-avue/crud/admin_manage/del',
                'created_at' => '2022-11-23 00:04:04',
                'id' => 10,
                'menu_id' => 19,
                'updated_at' => '2022-11-23 00:04:04',
            ),
            10 =>
            array (
                'api_method' => '1',
                'api_url' => '/k-avue/crud/role_manage/add',
                'created_at' => '2022-11-23 00:06:36',
                'id' => 11,
                'menu_id' => 20,
                'updated_at' => '2022-11-23 00:06:36',
            ),
            11 =>
            array (
                'api_method' => '2',
                'api_url' => '/k-avue/crud/role_manage/update',
                'created_at' => '2022-11-23 00:06:48',
                'id' => 12,
                'menu_id' => 21,
                'updated_at' => '2022-11-23 00:06:48',
            ),
            12 =>
            array (
                'api_method' => '3',
                'api_url' => '/k-avue/crud/role_manage/del',
                'created_at' => '2022-11-23 00:07:00',
                'id' => 13,
                'menu_id' => 22,
                'updated_at' => '2022-11-23 00:07:00',
            ),
            13 =>
            array (
                'api_method' => '0',
                'api_url' => '/k-avue/crud/role_manage/list',
                'created_at' => '2022-12-16 00:27:28',
                'id' => 14,
                'menu_id' => 6,
                'updated_at' => '2022-12-16 00:27:28',
            ),
            14 =>
            array (
                'api_method' => '1',
                'api_url' => 'k-avue/icon_manage/categorys_add',
                'created_at' => '2022-12-23 10:35:32',
                'id' => 15,
                'menu_id' => 23,
                'updated_at' => '2022-12-23 10:35:32',
            ),
            15 =>
            array (
                'api_method' => '2',
                'api_url' => 'k-avue/icon_manage/categorys_update',
                'created_at' => '2022-12-23 18:44:07',
                'id' => 16,
                'menu_id' => 24,
                'updated_at' => '2022-12-23 18:44:07',
            ),
            16 =>
            array (
                'api_method' => '3',
                'api_url' => 'k-avue/icon_manage/categorys_del',
                'created_at' => '2022-12-23 18:44:40',
                'id' => 17,
                'menu_id' => 25,
                'updated_at' => '2022-12-23 18:44:40',
            ),
            17 =>
            array (
                'api_method' => '0',
                'api_url' => 'k-avue/icon_manage/categorys',
                'created_at' => '2022-12-23 18:45:23',
                'id' => 18,
                'menu_id' => 29,
                'updated_at' => '2022-12-23 18:45:23',
            ),
            18 =>
            array (
                'api_method' => '0',
                'api_url' => 'k-avue/icon_manage/categorys',
                'created_at' => '2022-12-23 02:46:24',
                'id' => 19,
                'menu_id' => 11,
                'updated_at' => '2022-12-23 02:46:24',
            ),
            19 =>
            array (
                'api_method' => '0',
                'api_url' => 'k-avue/icon_manage/get_icon_url',
                'created_at' => '2022-12-23 10:47:40',
                'id' => 20,
                'menu_id' => 11,
                'updated_at' => '2022-12-23 10:47:40',
            ),
            20 =>
            array (
                'api_method' => '1',
                'api_url' => 'k-avue/icon_manage/icon_url',
                'created_at' => '2022-12-23 18:48:02',
                'id' => 21,
                'menu_id' => 30,
                'updated_at' => '2022-12-23 18:48:02',
            ),
            21 =>
            array (
                'api_method' => '0',
                'api_url' => 'k-avue/icon_manage/icon_list/{category_alias}',
                'created_at' => '2022-12-23 18:49:07',
                'id' => 22,
                'menu_id' => 11,
                'updated_at' => '2022-12-23 18:49:07',
            ),
            22 =>
            array (
                'api_method' => '3',
                'api_url' => 'k-avue/icon_manage/icon_del/{id}',
                'created_at' => '2022-12-23 18:49:28',
                'id' => 23,
                'menu_id' => 32,
                'updated_at' => '2022-12-23 18:49:28',
            ),
            23 =>
            array (
                'api_method' => '1',
                'api_url' => 'k-avue/icon_manage/add_icon',
                'created_at' => '2022-12-23 18:50:01',
                'id' => 24,
                'menu_id' => 31,
                'updated_at' => '2022-12-23 18:50:01',
            ),
            24 =>
            array (
                'api_method' => '0',
                'api_url' => '/k-avue/menu/menuList',
                'created_at' => '2023-02-08 13:08:06',
                'id' => 25,
                'menu_id' => 33,
                'updated_at' => '2023-02-08 13:08:06',
            ),
            25 =>
            array (
                'api_method' => '0',
                'api_url' => '/k-avue/menu/menuDetail/{id}',
                'created_at' => '2023-02-08 13:08:06',
                'id' => 26,
                'menu_id' => 33,
                'updated_at' => '2023-02-08 13:08:06',
            ),
            26 =>
            array (
                'api_method' => '0',
                'api_url' => '/k-avue/crud/admin_manage/list',
                'created_at' => '2023-02-08 13:09:15',
                'id' => 27,
                'menu_id' => 34,
                'updated_at' => '2023-02-08 13:09:15',
            ),
            27 =>
            array (
                'api_method' => '0',
                'api_url' => '/k-avue/crud/role_manage/list',
                'created_at' => '2023-02-08 13:10:30',
                'id' => 28,
                'menu_id' => 35,
                'updated_at' => '2023-02-08 13:10:30',
            ),
            28 =>
            array (
                'api_method' => '0',
                'api_url' => 'k-avue/icon_manage/categorys',
                'created_at' => '2023-02-08 13:12:10',
                'id' => 29,
                'menu_id' => 36,
                'updated_at' => '2023-02-08 13:12:10',
            ),
            29 =>
            array (
                'api_method' => '0',
                'api_url' => 'k-avue/icon_manage/get_icon_url',
                'created_at' => '2023-02-08 13:12:10',
                'id' => 30,
                'menu_id' => 36,
                'updated_at' => '2023-02-08 13:12:10',
            ),
            30 =>
            array (
                'api_method' => '0',
                'api_url' => 'k-avue/icon_manage/icon_list/{category_alias}',
                'created_at' => '2023-02-08 13:12:10',
                'id' => 31,
                'menu_id' => 36,
                'updated_at' => '2023-02-08 13:12:10',
            ),
        ));


    }
}