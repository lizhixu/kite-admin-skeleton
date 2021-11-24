<?php

namespace iLzx\AdminStarter\Controls;


use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(Request $request)
    {
        dd($request->all());
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