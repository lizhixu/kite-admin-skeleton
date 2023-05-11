<?php

namespace iLzx\AdminStarter\Controls;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use iLzx\AdminStarter\Facades\JWT\JWT;
use iLzx\AdminStarter\Models\Admin;
use iLzx\AdminStarter\Models\Role;
use iLzx\AdminStarter\Rules\Captcha;

class UserController extends Controller
{
    protected $noNeedRight = [
        'k-avue/user/getUserInfo',
    ];
    protected $noNeedLogin = [
        'k-avue/user/login',
    ];

    public function login(Request $request): array
    {
        $validate = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
            'redomStr' => 'required',
            'code'     => ['required', new Captcha($request->redomStr)],
        ]);
        $errors = $validate->errors()->first();
        if ($errors) {
            return adminOutput(201, [], $errors);
        }
        $admin_model = new Admin();
        $admin = $admin_model->where([
            ['username', '=', $request->username],
            ['password', '=', md5('kite' . $request->password)],
        ])->select('id', 'username', 'avatar')->first();
        if (!$admin) {
            return adminOutput(202, []);
        }
        $admin_model->where('id', $admin->id)->update([
            'last_login_time' => date('Y-m-d H:i:s')
        ]);
        $jwt = JWT::createToken($admin, $admin->id, $request->checked);
        Cache::forget('phrase' . $request->redomStr);
        return adminOutput(200, ['token' => $jwt]);
    }

    public function getUserInfo(): array
    {
        $user_info = config('userInfo');
        $user_info->time = time();
        $user_info->roles = ['admin'];
        $user_info->avatar = $user_info->avatar ?: 'https://dd-static.jd.com/ddimg/jfs/t1/167172/3/26848/10216/61f228a0Ecd5de48a/4ef7cc601beead36.png';
        $role = json_decode($user_info->role, true);
        $btn_list = (new Role())->getButtenRole(end($role));
        $user_info->authBtnList = $btn_list;
        return adminOutput(200, $user_info);
    }
}