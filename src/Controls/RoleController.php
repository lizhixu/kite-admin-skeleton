<?php

namespace iLzx\AdminStarter\Controls;

use Illuminate\Http\Request;
use iLzx\AdminStarter\Models\Role;

class RoleController extends Controller
{
    public function getManageList(Request $request)
    {
        $admin = new Role();
        $list = $admin->groupBy('id')->get()->map(function ($item) {
            $item->menu_ids = json_decode($item->menu_ids);

            return $item;
        })->toArray();
        $data = [
            'data'  => unlimited_class($list, 'id'),
            'total' => 0,
        ];

        return $this->success($data);
    }

    public function addRole(Request $request)
    {
        $request->validate([
            'role_name' => 'required',
            'sort'      => 'numeric',
        ]);
        $role = new Role();
        $role->fill($request->all());
        $role->menu_ids = json_encode($request->menu_ids);
        $role->sort = 0;
        $res = $role->save();

        return $this->success($res);
    }

    public function updateRole(Request $request)
    {
        $request->validate([
            'id'        => 'required|exists:kite_role,id|different:parent_id',
            'role_name' => 'required',
            'sort'      => 'numeric',
        ]);
        $request->offsetSet('parent_id', $request->parent_id ?? 0);
        unset($request->created_at, $request->updated_at);
        $role = Role::find($request->id);
        $role->fill($request->all());
        $role->menu_ids = json_encode($request->menu_ids);
        $role->updated_at = date('Y-m-d H:i:s');
        $res = $role->save();

        return $this->success($res);
    }

    public function delRole(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);

        $id = $request->id;
        $role = new Role();
        $role_list = $role->getSingle([['parent_id', $id]], '*');
        if ($role_list) {
            return $this->error('请先删除下级角色');
        }

        $res = $role->where('id', $id)->delete();

        return $this->success($res);
    }
}
