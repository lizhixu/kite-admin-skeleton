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
            'code'     => ['required', new Captcha($request->redomStr)],
        ]);
        $errors   = $validate->errors()->first();
        if ($errors) {
            return adminOutput(201, [], $errors);
        }
        $admin = Admin::where('username', $request->username)
            ->where('password', $request->password)->select()->first();
        if (!$admin) {
            return adminOutput(202, []);
        }
        $jwt = JWT::createToken($request->password);
        return adminOutput(200, ['token' => $jwt->toString()]);
    }

    public function getTopMenu(Request $request)
    {
        dd($request->all());
    }

    public function getUserInfo(Request $request)
    {
        dd($request->all());
    }
}