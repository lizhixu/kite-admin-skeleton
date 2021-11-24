<?php

namespace iLzx\AdminStarter\Controls;

use iLzx\AdminStarter\Models\Menu;

class MenuController extends Controller
{
    public function get_menu()
    {
        $data = [];
        $menu = new Menu();
        //一级分类
        $primary_class = $menu->getMenu(0, 'id', 'content');
        foreach ($primary_class as $key => $class) {
            $data['primary_class'][] = json_decode($class->content);
            $child_class             = $menu->getMenu($class->id, 'content');
            if ($child_class->isEmpty()) {
                unset($data['primary_class'][$key]);
                break;
            }
            foreach ($child_class as $k => $c_class) {
                $child_class[$k] = $c_class->content;
            }
            $data['child_class'][] = $child_class;
        }
        return adminOutput(100000, $data);
    }
}