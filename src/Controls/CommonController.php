<?php

namespace iLzx\AdminStarter\Controls;

use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Support\Facades\Cache;
use iLzx\AdminStarter\Models\Menu;
use iLzx\AdminStarter\Models\Role;

class CommonController extends Controller
{
    public function captcha($redomstr)
    {
        $builder = new CaptchaBuilder(4);
        $builder->setBackgroundColor('245', '247', '250');
        $builder->build();
        Cache::add('phrase' . $redomstr, $builder->getPhrase(), 60);
        return $builder->output(100, 38);
    }

    /**
     * 菜单下拉选项
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function menuOptions()
    {
        $menu = new Menu();
        $class = $menu->getMenu([], 'id', 'title', 'parent_id')->toArray();

        $data = unlimited_class($class, 'id');
        return $this->success($data);
    }

    /**
     * 角色下拉选项
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function ruleOptions()
    {
        $role = new Role();
        $role_list = $role->getList([], 'id', 'role_name', 'parent_id')->toArray();
        $data = unlimited_class($role_list, 'id');
        return $this->success($data);
    }
}