<?php

namespace iLzx\AdminStarter\Database\Seeds;

use Illuminate\Database\Seeder;

class KiteIconCategorysTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('kite_icon_categorys')->delete();

        \DB::table('kite_icon_categorys')->insert(array (
            0 =>
            array (
                'id' => 1,
                'category_name' => 'iconfont',
                'category_alias' => 'iconfont',
                'sort' => 0,
                'created_at' => '2023-01-16 13:59:03',
                'updated_at' => '2023-01-16 13:59:03',
            ),
            1 =>
            array (
                'id' => 2,
                'category_name' => 'element',
                'category_alias' => 'element',
                'sort' => 1,
                'created_at' => '2023-01-16 13:59:13',
                'updated_at' => '2023-01-16 13:59:13',
            ),
        ));


    }
}