<?php

namespace iLzx\AdminStarter\Controls;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AdminController extends Controller
{
    public function Index(): int
    {
        $data = $_GET['string'];

        $str = preg_replace(["/([a-zA-Z_]+[a-zA-Z0-9_]*)\s*:/", "/:\s*'(.*?)'/"], ['"\1":', ': "\1"'], $data);
        $str = str_replace(['\'', '\\'], ['"', ''], $str);
        echo $str;
        exit();
        $arr = explode(':', trim($string, '{}'));

        foreach ($arr as $a) {
            echo $a;
            echo "<br>";
            $a = str_replace('\\', '', $a);
            $arr_value = explode(':', $a);
            print_r($arr_value);
            echo "<br>";
            echo "<br>";
        }
        exit();
        return 12321312;
    }

    public function getOptions(Request $request)
    {
        dd($request->all());
    }
}