<?php

namespace iLzx\AdminStarter\Controls;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    /**
     * 创建角色
     * lzx add 2020/5/27 0:30.
     *
     * @param Request $request
     *
     * @return array
     */
    public function CreateRole(Request $request)
    {
        $name = $request->name;
        $guard_name = $request->guard_name;

        if ($data = Role::create(['name' => $name, 'guard_name' => $guard_name])) {
            return output('100001', $data);
        }
    }

    /**
     * 创建权限
     * lzx add 2020/5/27 0:31.
     *
     * @param Request $request
     *
     * @return array
     */
    public function CreatePermission(Request $request)
    {
        $name = $request->name;
        $guard_name = $request->guard_name;
        if ($data = Permission::create(['name' => $name, 'guard_name' => $guard_name])) {
            return output('100002', $data);
        }
    }

    /**
     * lzx add 2020/5/27 0:41.
     *
     * @param Request $request
     */
    public function givePermissionTo(Request $request)
    {
        $permission = $request->permission;
        $role = new Role();
        $role->givePermissionTo($permission);
    }
}
