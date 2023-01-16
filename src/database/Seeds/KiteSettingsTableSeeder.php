<?php

namespace iLzx\AdminStarter\Database\Seeds;

use Illuminate\Database\Seeder;

class KiteSettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('kite_settings')->delete();

        \DB::table('kite_settings')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'icon_cdn_url',
                'value' => '["\\/\\/at.alicdn.com\\/t\\/font_2348547_zjuiclx86c.css","\\/\\/netdna.bootstrapcdn.com\\/font-awesome\\/4.7.0\\/css\\/font-awesome.min.css","\\/\\/at.alicdn.com\\/t\\/c\\/font_3750819_oljwon1lpoi.css"]',
                'created_at' => '2023-01-16 13:57:33',
                'updated_at' => '2023-01-16 13:58:24',
            ),
        ));


    }
}