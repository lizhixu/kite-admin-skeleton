<?php

namespace iLzx\AdminStarter\Controls;

use Illuminate\Http\Request;
use iLzx\AdminStarter\Rules\Captcha;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $validate = $request->validate([
            'username' => 'required',
            'password' => 'required',
            'redomStr' => 'required',
            'code'     => ['required', new Captcha($request->redomStr)],
        ]);
        $errors   = $validate->all();
        if (!$errors) {
            dd($errors);
        }
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