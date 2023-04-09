<?php

namespace iLzx\AdminStarter\Controls;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use iLzx\AdminStarter\Models\Admin;
use iLzx\AdminStarter\Models\ApiLogger;
use iLzx\AdminStarter\Models\ApiResource;
use iLzx\AdminStarter\Models\Menu;

class ApiLogController extends Controller
{
    public function getList(Request $request)
    {
        $page_size = $request->page_size ?? 10;
        $logger = new ApiLogger();
        $res = $logger->where(function ($query) use ($request) {
            if (filled($request->created_at)) {
                $query->whereBetween('created_at', $request->created_at);
            }
        })
            ->select('id', 'api_url', 'request_method', 'request_ip', 'response_status_code', 'admin_id', 'created_at')
            ->orderBy('id', 'desc')
            ->paginate($page_size);

        $admin_ids = array_unique(array_column($res->items(), 'admin_id'));
        $admin_list = (new Admin())->getAdmin([[function ($query) use ($admin_ids) {
            if ($admin_ids) {
                $query->whereIn('id', $admin_ids);
            }
        }]], 'id', 'name')->keyBy('id')->toArray();

        $api_urls = array_unique(array_column($res->items(), 'api_url'));
        $menu_ids = (new ApiResource())->getList([[function ($query) use ($api_urls) {
            if ($api_urls) {
                $query->whereIn(DB::raw('trim(leading "/" from api_url)'), $api_urls);
            }
        }]], 'menu_id', DB::raw('trim(leading "/" from api_url) as api_url'));
        $menu_ids = array_column($menu_ids, 'menu_id', 'api_url');
        $primary_class = (new Menu())->getMenu([], 'id', 'title', 'parent_id')->toArray();
        $data = [
            'data'  => collect($res->items())->map(function ($item) use ($admin_list, $menu_ids, $primary_class) {
                $item['name'] = $admin_list[$item['admin_id']]['name'] ?? '';
                $item['title'] = !empty($menu_ids[$item->api_url])
                    ? str_joint($menu_ids[$item->api_url], $primary_class, 'title')
                    : '系统';
                return $item;
            }),
            'total' => $res->total()
        ];
        return $this->success($data);
    }

    public function getDetail($id)
    {
        $logger = new ApiLogger();
        $res = $logger->where(['id' => $id])
            ->first();
        return $this->success($res);
    }
}