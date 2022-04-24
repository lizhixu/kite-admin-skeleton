<?php

namespace iLzx\AdminStarter\Controls;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use iLzx\AdminStarter\Facades\JWT\JWT;
use iLzx\AdminStarter\Models\Admin;
use iLzx\AdminStarter\Rules\Captcha;

class UserController extends Controller
{
    public function login(Request $request): array
    {
        $validate = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
            'redomStr' => 'required',
            'code' => ['required', new Captcha($request->redomStr)],
        ]);
        $errors = $validate->errors()->first();
        if ($errors) {
            return adminOutput(201, [], $errors);
        }
        $admin = Admin::where([
            ['username', '=', $request->username],
            ['password', '=', md5('kite' . $request->password)],
        ])->select('id', 'username', 'avatar')->first();
        if (!$admin) {
            return adminOutput(202, []);
        }
        $jwt = JWT::createToken($admin, $admin->id, $request->checked);
        return adminOutput(200, ['token' => $jwt]);
    }

    public function getTopMenu(Request $request)
    {
        return adminOutput(200, ['header' => $request]);
    }

    public function getUserInfo(): array
    {
        $user_info = config('userInfo');
        $user_info->time = time();
        $user_info->roles = ['admin'];
        $user_info->authBtnList = ['btn.add', 'btn.del', 'btn.edit', 'btn.link'];
        return adminOutput(200, $user_info);
    }
}