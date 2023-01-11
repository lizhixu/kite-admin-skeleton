<?php

namespace iLzx\AdminStarter\Controls;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use iLzx\AdminStarter\Models\Icon;
use iLzx\AdminStarter\Models\Setting;

class IconManageController extends Controller
{
    protected $noNeedRight = ['k-avue/common/get_icon_options'];

    /**
     * 图标类别
     * @return \Illuminate\Http\JsonResponse
     */
    public function categorysList()
    {
        $data = DB::table('kite_icon_categorys')->orderBy('sort')->get();
        return $this->success($data);
    }

    public function categorysAdd(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_name'  => 'required',
            'category_alias' => 'required|unique:kite_icon_categorys,category_alias',
            'sort'           => 'integer',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return $this->error($errors->first());
        }
        $data = DB::table('kite_icon_categorys')->insert([
            'category_name'  => $request->category_name,
            'category_alias' => $request->category_alias,
            'sort'           => $request->sort,
            'created_at'     => date('Y-m-d H:i:s'),
            'updated_at'     => date('Y-m-d H:i:s'),
        ]);
        return $this->success($data);
    }

    public function categorysUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id'             => 'required:exists:kite_icon_categorys',
            'category_name'  => 'required',
            'category_alias' => ['required', Rule::unique('kite_icon_categorys')->ignore($request->id)],
            'sort'           => 'integer',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return $this->error($errors->first());
        }
        $data = DB::table('kite_icon_categorys')->where('id', $request->id)->update([
            'category_name' => $request->category_name,
            'sort'          => $request->sort,
            'updated_at'    => date('Y-m-d H:i:s'),
        ]);
        return $this->success($data);
    }

    public function categorysDelete(Request $request)
    {
        if (!filled($request->id)) {
            return $this->error();
        }
        //检查是否有图标
        $icon = (new Icon())->where('category_id', $request->id)->exists();
        if ($icon) {
            return $this->error('请先删除分类下的图标');
        }
        $data = DB::table('kite_icon_categorys')->where('id', $request->id)->delete();
        return $this->success($data);
    }

    public function getIconUrl()
    {
        $data = Setting::get('icon_cdn_url');
        return $this->success(json_decode($data, true));
    }

    public function iconUrl(Request $request)
    {
        $icon_cdn_url = array_merge(array_filter($request->icon_cdn_url));
        $res = Setting::upsert(['name' => 'icon_cdn_url', 'value' => json_encode($icon_cdn_url)], ['name'], ['value']);
        return $this->success($res);
    }

    public function iconAdd(Request $request)
    {
        $icon = new Icon();
        $data = $request->input();
        $icon->fill($data);
        $icon->admin_id = get_user_info()['id'];
        $icon->category_id = $data['id'];
        $res = $icon->save();
        return $this->success($res);
    }

    public function iconList($category_alias)
    {
        $icon = new Icon();
        $data = $icon->where('category_alias', $category_alias)->select('kite_icons.*', 'category_alias')
            ->leftJoin('kite_icon_categorys', 'kite_icon_categorys.id', '=', 'kite_icons.category_id')->get();
        return $this->success($data);
    }

    public function iconDel($id)
    {
        $icon = new Icon();
        $res = $icon->destroy($id);
        return $this->success($res);
    }

    public function iconOptions()
    {
        //分类
        $icon = new Icon();
        $icon_list = array_value_group($icon->select('category_id', 'icon_name as label', 'icon_class as value')->get()->toArray(), 'category_id');
        $categorys = DB::table('kite_icon_categorys')
            ->orderBy('sort')
            ->select('id', 'category_name as label')
            ->get()
            ->map(function ($item) use ($icon_list) {
                $item->list = $icon_list[$item->id];
                return $item;
            });
        return $this->success($categorys);
    }
}