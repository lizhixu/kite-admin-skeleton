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
        $menu = new Menu();
        //一级分类
        $primary_class = $menu->getMenu([[function ($query) {
            $query->whereIn('type', ['0', '1', '2']);
        }]], '*')->map(function ($item) {
            return [
                'path'      => $item->path,
                'name'      => $item->name,
                'component' => $item->component ?: 'layout/routerView/parent',
                'redirect'  => in_array($item['type'], ['1', '2'], true) ? '' : $item->redirect,
                'value'     => $item->id,
                'parent_id' => $item->parent_id,
                'meta'      => [
                    'title'       => $item->title,
                    'icon'        => $item->icon,
                    'isLink'      => in_array($item['type'], ['1', '2'], true) ? $item->redirect : false,
                    'isHide'      => $item->isHide === '1',
                    'isKeepAlive' => $item->isKeepAlive === '1',
                    'isAffix'     => $item->isAffix === '1',
                    'isIframe'    => $item['type'] === '1',
                    'roles'       => ['admin'],
                ],
            ];
        });
        $primary_class = unlimited_class(object_to_array($primary_class));
        return $this->success($primary_class);
    }

    public function menuDetailSave(Request $request)
    {
        DB::beginTransaction();
        $data = $request::all();
        if ($data['parent_id'] == $data['id']) {
            return $this->error('上级分类不能选自己');
        }
        try {
            $menu = Menu::find($data['id']);
            $menu->fill($data);
            $menu->component = $data['component'] ?? '';
            $menu->icon      = $data['icon'] ?? '';
            $menu->redirect  = $data['redirect'] ?? '';
            $menu->path      = $data['path'] ?? '';
            $menu->options   = $data['options'] ?? '';
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

    public function menuDetail($id)
    {
        $menu         = new Menu();
        $api_resource = new ApiResource();

        $class = $menu::find($id)->toArray();
        if (!$class) {
            return $this->error('分类不存在');
        }
        $class['api_resource'] = $api_resource->getList(['menu_id' => $class['id']], '*');
        return $this->success($class);
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