<?php

namespace iLzx\AdminStarter\Controls;

use iLzx\AdminStarter\Models\Menu;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use iLzx\AdminStarter\Models\ApiResource;
use iLzx\AdminStarter\Requests\MenuRequest;

class MenuController extends Controller
{
    public function getMenu(): array
    {
//        $data = [];
//        $menu = new Menu();
//        //一级分类
//        $primary_class = $menu->getMenu(0, 'id', 'content');
//        foreach ($primary_class as $key => $class) {
//            $data['primary_class'][] = json_decode($class->content);
//            $child_class             = $menu->getMenu($class->id, 'content');
//            if ($child_class->isEmpty()) {
//                unset($data['primary_class'][$key]);
//                break;
//            }
//            foreach ($child_class as $k => $c_class) {
//                $child_class[$k] = $c_class->content;
//            }
//            $data['child_class'][] = $child_class;
//        }
        return adminOutput(200, json_decode('[{"path":"/home","name":"home","component":"home","meta":{"title":"message.router.home","isLink":"","isHide":false,"isKeepAlive":true,"isAffix":true,"isIframe":false,"roles":["admin","common"],"icon":"iconfont icon-shouye"}},{"path":"/setting","name":"setting","component":"layout/routerView/parent","redirect":"/setting/permission","meta":{"title":"系统设置","isLink":"","isHide":false,"isKeepAlive":true,"isAffix":false,"isIframe":false,"roles":["admin","common"],"icon":"iconfont icon-caidan"},"children":[{"path":"/setting/permission","name":"menus","component":"layout/routerView/parent","redirect":"/setting/permission/menus","meta":{"title":"权限系统","isLink":"","isHide":false,"isKeepAlive":true,"isAffix":false,"isIframe":false,"roles":["admin","common"],"icon":"iconfont icon-caidan"},"children":[{"path":"/setting/permission/menus","name":"menu121","component":"setting/permission/menus","meta":{"title":"菜单管理","isLink":"","isHide":false,"isKeepAlive":true,"isAffix":false,"isIframe":false,"roles":["admin","common"],"icon":"iconfont icon-caidan"}},{"path":"/menu/menu1/menu12/menu122","name":"menu122","component":"menu/menu1/menu12/menu122/index","meta":{"title":"角色管理","isLink":"","isHide":false,"isKeepAlive":true,"isAffix":false,"isIframe":false,"roles":["admin","common"],"icon":"iconfont icon-caidan"}},{"path":"/menu/menu1/menu12/menu122","name":"menu122","component":"menu/menu1/menu12/menu122/index","meta":{"title":"用户管理","isLink":"","isHide":false,"isKeepAlive":true,"isAffix":false,"isIframe":false,"roles":["admin","common"],"icon":"iconfont icon-caidan"}}]}]}]', false));
    }

    public function saveMenu(Request $request)
    {
        DB::beginTransaction();
        $data = $request::all();
        try {
            $menu = new Menu();
            $menu->fill($data);
            $menu->save();
            $api_resource      = new ApiResource();
            $api_resource_data = $data['api_resource'];
            foreach ($api_resource_data as $value) {
                if ($value['api_method'] && $value['api_url']) {
                    $api_resource->fill($value);
                    $api_resource->save();
                }
            }
            DB::commit();
        } catch (QueryException $exception) {
            DB::rollBack();
            return $this->error($exception->getMessage());
        }
        return $this->success($data);
    }

    public function menuList()
    {
        $menu = new Menu();
        //一级分类
        $primary_class = $menu->getMenu([], 'id as value', 'title as label', 'name', 'type', 'parent_id');
        $primary_class = unlimited_class($primary_class->toArray());
        return $this->success($primary_class);
    }

    public function menuSave(MenuRequest $request)
    {
        DB::beginTransaction();
        try {
            $menu            = new Menu();
            $menu->name      = $request->name;
            $menu->title     = $request->label;
            $menu->parent_id = $request->parent_id ?? 0;
            $menu->save();
            DB::commit();
            return $this->success($menu);
        } catch (QueryException $exception) {
            DB::rollBack();
            return $this->error($exception->getMessage());
        }
    }

    public function menuUpdate(MenuRequest $request)
    {
        DB::beginTransaction();
        try {
            $menu            = Menu::find($request->value);
            $menu->name      = $request->name;
            $menu->title     = $request->label;
            $menu->parent_id = $request->parent_id ?? 0;
            $menu->save();
            DB::commit();
            return $this->success($menu);
        } catch (QueryException $exception) {
            DB::rollBack();
            return $this->error($exception->getMessage());
        }
    }

    public function menuDelete(Request $request)
    {
        $data = $request::input();
        $id   = $data['value'];
        $menu = new Menu();
        //下级菜单
        $class = $menu->getMenu(['parent_id' => $id], 'id')->toArray();
        if ($class) {
            return $this->error('菜单存在子菜单，请先删除子菜单');
        }
        DB::beginTransaction();
        try {
            $menu->where('id', $id)->delete();
            DB::commit();
            return $this->success($menu);
        } catch (QueryException $exception) {
            DB::rollBack();
            return $this->error($exception->getMessage());
        }
    }
}