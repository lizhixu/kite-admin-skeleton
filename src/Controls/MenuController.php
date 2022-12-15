<?php

namespace iLzx\AdminStarter\Controls;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use iLzx\AdminStarter\Models\Menu;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use iLzx\AdminStarter\Models\ApiResource;
use iLzx\AdminStarter\Models\Role;
use iLzx\AdminStarter\Requests\MenuRequest;

class MenuController extends Controller
{
    protected $noNeedRight = [
        'k-avue/getMenu'
    ];

    public function getMenu(): array
    {
        $conditions = [[function ($query) {
            $query->whereIn('type', ['0', '1', '2']);
        }]];
        $menu = new Menu();
        //权限
        $user_info = config('userInfo');
        $role = json_decode($user_info->role, true);
        $role_id = end($role);
        if ($role_id != 1) {
            $role_list = (new Role())->getSingle([['id', $role_id]], 'menu_ids');
            $menu_ids = explode(',', str_replace(['[', ']'], [''], $role_list->menu_ids));
            $conditions[] = [function ($query) use ($menu_ids) {
                $query->whereIn('id', $menu_ids);
            }];
        }

        $primary_class = $menu->getMenu($conditions, '*')->map(function ($item) {
            if ($item->tpl_type == 2) {
                $component = $item->options_type == 1 ? 'avue/crud_tpl' : '';
            } else {
                $component = $item->component ?: 'layout/routerView/parent';
            }
            return [
                'path'      => $item->path,
                'name'      => $item->name,
                'component' => $component,
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
        $data = $request->all();
        if ($data['parent_id'] == $data['id']) {
            return $this->error('上级分类不能选自己');
        }
        try {
            $menu = Menu::find($data['id']);
            $menu->fill($data);
            $menu->component = $data['component'] ?? '';
            $menu->icon = $data['icon'] ?? '';
            $menu->redirect = $data['redirect'] ?? '';
            $menu->path = $data['path'] ?? '';
            $menu->options = $data['options'] ?? '';
            $menu->save();
            $api_resource_data = $data['api_resource'] ?? [];
            foreach ($api_resource_data as $value) {
                $api_resource = isset($value['id']) ? ApiResource::find($value['id']) : new ApiResource();
                $value['menu_id'] = $data['id'];
                if (isset($value['api_method']) && $value['api_url']) {
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
        $menu = new Menu();
        $api_resource = new ApiResource();

        $class = $menu::find($id)->toArray();
        if (!$class) {
            return $this->error('分类不存在');
        }
        $class['api_resource'] = $api_resource->getList(['menu_id' => $class['id']], '*');
        $class['options_type'] = (int)$class['options_type'];
        $class['options_value'] = str_to_avue($class['options']);
        return $this->success($class);
    }

    public function menuList()
    {
        $menu = new Menu();
        //一级分类
        $primary_class = $menu->getMenu([], 'id as value', 'title as label', 'name', 'type', 'tpl_type', 'parent_id');
        $primary_class = unlimited_class($primary_class->toArray());
        return $this->success($primary_class);
    }

    public function menuSave(MenuRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'name'  => 'required|unique:kite_menus,name',
            'label' => 'required'
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return $this->error($errors->first());
        }
        DB::beginTransaction();
        try {
            $menu = new Menu();
            $menu->name = $request->name;
            $menu->title = $request->label;
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
        $validator = Validator::make($request->all(), [
            'name'  => ['required', Rule::unique('kite_menus')->ignore($request->value)],
            'label' => 'required'
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return $this->error($errors->first());
        }
        DB::beginTransaction();
        try {
            $menu = Menu::find($request->value);
            $menu->name = $request->name;
            $menu->title = $request->label;
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
        $request->validate([
            'value' => 'required',
        ]);
        $data = $request->input();
        $id = $data['value'];
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