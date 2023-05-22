<?php

namespace iLzx\AdminStarter\Controls;

class PersonalController extends Controller
{
    public function getUserInfo(): array
    {
        $user_info = config('userInfo');

        return adminOutput(200, $user_info);
    }
}
