<?php

namespace iLzx\AdminStarter\Database\Seeds;

use Illuminate\Database\Seeder;

class KiteIconsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('kite_icons')->delete();

        \DB::table('kite_icons')->insert(array (
            0 =>
            array (
                'id' => 2,
                'category_id' => 1,
                'icon_name' => '首页',
                'icon_class' => 'iconfont icon-shouye',
                'admin_id' => 1,
                'created_at' => '2023-01-16 14:00:03',
                'updated_at' => '2023-01-16 14:00:03',
            ),
            1 =>
            array (
                'id' => 3,
                'category_id' => 2,
                'icon_name' => '设置',
                'icon_class' => 'el-icon-set-up',
                'admin_id' => 1,
                'created_at' => '2023-01-16 14:00:24',
                'updated_at' => '2023-01-16 14:00:24',
            ),
            2 =>
            array (
                'id' => 4,
                'category_id' => 1,
                'icon_name' => '菜单',
                'icon_class' => 'iconfont icon-caidan',
                'admin_id' => 1,
                'created_at' => '2023-01-16 14:00:41',
                'updated_at' => '2023-01-16 14:00:41',
            ),
            3 =>
            array (
                'id' => 5,
                'category_id' => 2,
                'icon_name' => '用户',
                'icon_class' => 'el-icon-user',
                'admin_id' => 1,
                'created_at' => '2023-01-16 14:01:00',
                'updated_at' => '2023-01-16 14:01:00',
            ),
            4 =>
            array (
                'id' => 6,
                'category_id' => 2,
                'icon_name' => '钥匙',
                'icon_class' => 'el-icon-key',
                'admin_id' => 1,
                'created_at' => '2023-01-16 15:40:10',
                'updated_at' => '2023-01-16 15:40:10',
            ),
            5 =>
            array (
                'id' => 7,
                'category_id' => 2,
                'icon_name' => '文件夹',
                'icon_class' => 'el-icon-folder',
                'admin_id' => 1,
                'created_at' => '2023-01-16 15:40:28',
                'updated_at' => '2023-01-16 15:40:28',
            ),
            6 =>
            array (
                'id' => 8,
                'category_id' => 1,
                'icon_name' => '附件',
                'icon_class' => 'iconfont icon-fujian',
                'admin_id' => 1,
                'created_at' => '2023-01-16 15:40:44',
                'updated_at' => '2023-01-16 15:40:44',
            ),
            7 =>
            array (
                'id' => 9,
                'category_id' => 1,
                'icon_name' => '图标',
                'icon_class' => 'iconfont icon-tubiao',
                'admin_id' => 1,
                'created_at' => '2023-01-16 15:41:00',
                'updated_at' => '2023-01-16 15:41:00',
            ),
            8 =>
            array (
                'id' => 10,
                'category_id' => 1,
                'icon_name' => '表单',
                'icon_class' => 'iconfont icon-biaodan',
                'admin_id' => 1,
                'created_at' => '2023-01-16 15:42:05',
                'updated_at' => '2023-01-16 15:42:05',
            ),
            9 =>
            array (
                'id' => 11,
                'category_id' => 1,
                'icon_name' => '表格',
                'icon_class' => 'iconfont icon-biaoge',
                'admin_id' => 1,
                'created_at' => '2023-01-16 15:43:19',
                'updated_at' => '2023-01-16 15:43:19',
            ),
            10 =>
            array (
                'id' => 12,
                'category_id' => 1,
                'icon_name' => '按钮',
                'icon_class' => 'iconfont icon-anniuzu',
                'admin_id' => 1,
                'created_at' => '2023-01-16 15:43:37',
                'updated_at' => '2023-01-16 15:43:37',
            ),
            11 =>
            array (
                'id' => 13,
                'category_id' => 1,
                'icon_name' => '代码',
                'icon_class' => 'iconfont icon-code',
                'admin_id' => 1,
                'created_at' => '2023-01-16 15:43:51',
                'updated_at' => '2023-01-16 15:43:51',
            ),
            12 =>
            array (
                'id' => 14,
                'category_id' => 1,
                'icon_name' => 'json',
                'icon_class' => 'iconfont icon-json',
                'admin_id' => 1,
                'created_at' => '2023-01-16 15:44:11',
                'updated_at' => '2023-01-16 15:44:11',
            ),
        ));


    }
}