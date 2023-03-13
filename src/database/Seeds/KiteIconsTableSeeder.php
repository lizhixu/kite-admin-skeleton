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
                'admin_id' => 1,
                'category_id' => 1,
                'created_at' => '2023-01-16 14:00:03',
                'icon_class' => 'iconfont icon-shouye',
                'icon_name' => '首页',
                'id' => 2,
                'updated_at' => '2023-01-16 14:00:03',
            ),
            1 => 
            array (
                'admin_id' => 1,
                'category_id' => 2,
                'created_at' => '2023-01-16 14:00:24',
                'icon_class' => 'el-icon-set-up',
                'icon_name' => '设置',
                'id' => 3,
                'updated_at' => '2023-01-16 14:00:24',
            ),
            2 => 
            array (
                'admin_id' => 1,
                'category_id' => 1,
                'created_at' => '2023-01-16 14:00:41',
                'icon_class' => 'iconfont icon-caidan',
                'icon_name' => '菜单',
                'id' => 4,
                'updated_at' => '2023-01-16 14:00:41',
            ),
            3 => 
            array (
                'admin_id' => 1,
                'category_id' => 2,
                'created_at' => '2023-01-16 14:01:00',
                'icon_class' => 'el-icon-user',
                'icon_name' => '用户',
                'id' => 5,
                'updated_at' => '2023-01-16 14:01:00',
            ),
            4 => 
            array (
                'admin_id' => 1,
                'category_id' => 2,
                'created_at' => '2023-01-16 15:40:10',
                'icon_class' => 'el-icon-key',
                'icon_name' => '钥匙',
                'id' => 6,
                'updated_at' => '2023-01-16 15:40:10',
            ),
            5 => 
            array (
                'admin_id' => 1,
                'category_id' => 2,
                'created_at' => '2023-01-16 15:40:28',
                'icon_class' => 'el-icon-folder',
                'icon_name' => '文件夹',
                'id' => 7,
                'updated_at' => '2023-01-16 15:40:28',
            ),
            6 => 
            array (
                'admin_id' => 1,
                'category_id' => 1,
                'created_at' => '2023-01-16 15:40:44',
                'icon_class' => 'iconfont icon-fujian',
                'icon_name' => '附件',
                'id' => 8,
                'updated_at' => '2023-01-16 15:40:44',
            ),
            7 => 
            array (
                'admin_id' => 1,
                'category_id' => 1,
                'created_at' => '2023-01-16 15:41:00',
                'icon_class' => 'iconfont icon-tubiao',
                'icon_name' => '图标',
                'id' => 9,
                'updated_at' => '2023-01-16 15:41:00',
            ),
            8 => 
            array (
                'admin_id' => 1,
                'category_id' => 1,
                'created_at' => '2023-01-16 15:42:05',
                'icon_class' => 'iconfont icon-biaodan',
                'icon_name' => '表单',
                'id' => 10,
                'updated_at' => '2023-01-16 15:42:05',
            ),
            9 => 
            array (
                'admin_id' => 1,
                'category_id' => 1,
                'created_at' => '2023-01-16 15:43:19',
                'icon_class' => 'iconfont icon-biaoge',
                'icon_name' => '表格',
                'id' => 11,
                'updated_at' => '2023-01-16 15:43:19',
            ),
            10 => 
            array (
                'admin_id' => 1,
                'category_id' => 1,
                'created_at' => '2023-01-16 15:43:37',
                'icon_class' => 'iconfont icon-anniuzu',
                'icon_name' => '按钮',
                'id' => 12,
                'updated_at' => '2023-01-16 15:43:37',
            ),
            11 => 
            array (
                'admin_id' => 1,
                'category_id' => 1,
                'created_at' => '2023-01-16 15:43:51',
                'icon_class' => 'iconfont icon-code',
                'icon_name' => '代码',
                'id' => 13,
                'updated_at' => '2023-01-16 15:43:51',
            ),
            12 => 
            array (
                'admin_id' => 1,
                'category_id' => 1,
                'created_at' => '2023-01-16 15:44:11',
                'icon_class' => 'iconfont icon-json',
                'icon_name' => 'json',
                'id' => 14,
                'updated_at' => '2023-01-16 15:44:11',
            ),
            13 => 
            array (
                'admin_id' => 1,
                'category_id' => 2,
                'created_at' => '2023-02-17 18:50:02',
                'icon_class' => 'el-icon-notebook-2',
                'icon_name' => '笔记本',
                'id' => 15,
                'updated_at' => '2023-02-17 18:50:02',
            ),
            14 => 
            array (
                'admin_id' => 1,
                'category_id' => 2,
                'created_at' => '2023-02-20 16:40:24',
                'icon_class' => 'el-icon-upload2',
                'icon_name' => '上传',
                'id' => 16,
                'updated_at' => '2023-02-20 16:40:24',
            ),
        ));
        
        
    }
}