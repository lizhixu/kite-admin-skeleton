<?php

namespace iLzx\AdminStarter\Controls;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use iLzx\AdminStarter\Facades\JWT\JWT;
use iLzx\AdminStarter\Models\Admin;
use iLzx\AdminStarter\Models\Role;
use iLzx\AdminStarter\Rules\Captcha;

class PersonalController extends Controller
{
    public function getUserInfo(): array
    {
        $user_info = config('userInfo');
        return adminOutput(200, $user_info);
    }
}