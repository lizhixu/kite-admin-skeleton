<?php

namespace iLzx\AdminStarter\Controls;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
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
        $list = $admin->groupBy('id')->select(['name', 'avatar', 'username', 'role', 'status', 'last_login_time'])->fastPaginate($page_size);
        $items = collect($list->items())->map(function ($item) {
            $item->status = (string)$item->status;
            return $item;
        });
        $data = [
            'data'  => $items,
            'total' => $list->total()
        ];
        return $this->success($data);
    }
}