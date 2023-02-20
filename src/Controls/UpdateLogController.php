<?php

namespace iLzx\AdminStarter\Controls;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use iLzx\AdminStarter\Models\Attachment;

class UpdateLogController extends Controller
{
    public $noNeedRight = [
        'k-avue/common/upload'
    ];
    public function getList(Request $request)
    {
        $page_size = $request->page_size??10;
        $admin = new Attachment();
        $res = $admin->where(function ($query) use ($request){
            if (filled($request->mode_name)){
                $query->where('mode_name','like',"%{$request->mode_name}%");
            }
            if (filled($request->username)){
                $query->where('kite_admin.username','like',"%{$request->username}%")
                    ->orWhere('kite_admin.name','like',"%{$request->username}%");
            }
        })->leftJoin('kite_admin','kite_admin.id','=','kite_attachment_manage.admin_id')
            ->select('kite_attachment_manage.*','kite_admin.username')
            ->orderBy('kite_attachment_manage.id','desc')
            ->paginate($page_size);
        $data = [
            'data'  => $res->items(),
            'total' => $res->total()
        ];
        return $this->success($data);
    }

    public function upload(Request $request)
    {
        $request->validate([
            'mode_name' => 'required|exists:kite_menus,name',
            'file'      => 'required|file',
        ]);
        //上传文件
        $path = $request->file('file')->store('/public/' . $request->mode_name . '/'. date('Y/m'));
        //记录日志
        $admin = new Attachment();
        $admin->mode_name = $request->mode_name;
        $admin->file_url = asset(Storage::url($path));
        $admin->file_ext = $request->file->extension();
        $admin->file_size = $request->file->getSize();
        $admin->admin_id = get_user_info()['id']??'';
        $admin->save();
        return $this->success([
            'img_src'=>Storage::url($path),
            'img_url'=>asset(Storage::url($path)),
        ]);
    }
}