<?php

namespace iLzx\AdminStarter\Controls;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rule;
use iLzx\AdminStarter\Models\Admin;
use iLzx\AdminStarter\Models\Menu;
use Spatie\QueryBuilder\QueryBuilder;

class AdminController extends Controller
{
    public function getOptions(Request $request)
    {
        $options_name = $request->options_name;
        if (!$options_name) {
            return $this->error();
        }
        $menu = new Menu();
        $class = $menu->getMenu(['name' => $options_name], 'options')->toArray();
        $data = str_to_avue($class[0]['options']);
        return $this->success($data);
    }

    public function getManageList(Request $request)
    {
        $page_size = $request->page_size;
        $admin = new Admin();
        $where = [];
        if ($request->filled('name')) {
            $where[] = ['name', 'like', $request->name];
        }
        $list = $admin->groupBy('id')->where($where)->select(['id', 'name', 'avatar', 'username', 'role', 'status', 'last_login_time'])->fastPaginate($page_size);
        $items = collect($list->items())->map(function ($item) {
            $item->status = (string)$item->status;
            $item->role = json_decode($item->role);
            return $item;
        });
        $data = [
            'data'  => $items,
            'total' => $list->total()
        ];
        return $this->success($data);
    }

    public function addManage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required',
            'role'     => 'required',
            'status'   => 'required|in:0,1',
            'username' => 'required|unique:kite_admin,username',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return $this->error($errors->first());
        }
        $admin = new Admin();
        $admin->fill($request->all());
        $admin->password = md5('kite' . $request->password);
        $admin->role = json_encode($request->role);
        $res = $admin->save();
        return $this->success($res);
    }

    public function updateManage(Request $request)
    {
        $request->validate([
            'id'       => 'required|exists:kite_admin,id',
            'name'     => 'required',
            'role'     => 'required',
            'status'   => 'required|in:0,1',
            'username' => ['required', Rule::unique('kite_admin')->ignore($request->id),],
        ]);
        if (filled($request->password)) {
            $request->offsetSet('password', md5('kite' . $request->password));
        } else {
            unset($request->password);
        }
        unset($request->created_at, $request->updated_at);
        $admin = Admin::find($request->id);
        $admin->fill($request->all());
        $admin->updated_at = date('Y-m-d H:i:s');
        $res = $admin->save();
        return $this->success($res);
    }

    public function delManage(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);

        $id = $request->id;
        if ($id == 1) {
            return $this->error('主超级管理员不可删除');
        }

        $admin = new Admin();
        $res = $admin->where('id', $id)->delete();
        return $this->success($res);
    }
}